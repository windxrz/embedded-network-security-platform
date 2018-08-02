// @file: index.c
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Contributors:
//   Korepwx              <public@korepwx.com>

#include <assert.h>
#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <dirent.h>
#include "urllib.h"

static int is_admin = 0;
static char admuser[16], admpass[16];
static char large_buf[8192];

// Do authentication according to the cookie
void check_auth()
{
    char name[64], pass[64];
    int varlen = sizeof(large_buf);
    char *cookie = getenv("HTTP_COOKIE");

    is_admin = 0;
    if (!cookie)
        return;
    if (strncmp(cookie, "admin=", 6) == 0)
    {
        if (!urldecode(cookie + 6, strlen(cookie) - 6, large_buf, &varlen))
        {
            return;
        }
    }

    char *delimpos = strstr(large_buf, ":");
    if (!delimpos)
        return;
    *delimpos = 0;

    strcpy(pass, delimpos + 1);
    strcpy(name, large_buf);
    if (strcmp(name, admuser) == 0 && strcmp(pass, admpass) == 0)
    {
        is_admin = 1;
    }
}

// Duplicate existing string
static char *strdup(char *s)
{
    int slen = strlen(s);
    char *ret = malloc(slen + 1);
    memcpy(ret, s, slen + 1);
    return ret;
}

// Die with error code
static void diepage(int code, char *message)
{
    printf("Status: %d %s\nContent-Type: text/plain\n\n%s",
           code, message, message);
    exit(0);
}

// The gallery jpeg.
void readimage(char *fname)
{
    printf("Content-Type: image/jpeg\n\n");
    FILE *fin = fopen(fname, "rb");
    if (fin)
    {
        int bytesRead = 0;
        while ((bytesRead = fread(large_buf, 1, sizeof(large_buf), fin)) > 0)
        {
            fwrite(large_buf, 1, bytesRead, stdout);
        }
        fclose(fin);
    }
    exit(0);
}

int my_strcmp(const void *a, const void *b)
{
    return strcmp(*(char **)a, *(char **)b);
}

// The index page
void indexpage()
{
    printf("Content-Type: text/html\n\n");
    printf("<html><head>"
           "<meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\">"
           "<title>首页 - 未来道具研究所</title></head><body>");
    printf("<h1>这里是未来道具研究所</h1>");
    printf("<p><a href=\"gallery.jpg\">"
           "<img src=\"/index.cgi?gallery.jpg\" width=\"600px\" /></a></p>");

    // List all pages under "./data"
    char *names[32];
    int count = 0;
    DIR *dirp;
    struct dirent *direntp;
    if ((dirp = opendir("../data")) != NULL)
    {
        while ((direntp = readdir(dirp)) != NULL)
        {
            char *fname = direntp->d_name;
            if (strncmp(fname, ".", 1) == 0)
                continue;
            if (strstr(fname, "8") != NULL)
                continue;
            names[count++] = strdup(fname);
        }
    }
    closedir(dirp);

    // Sort the names, and construct the page.
    int idx;
    char namebuf[256];
    qsort(names, count, sizeof(char *), my_strcmp);
    for (idx = 0; idx < count; ++idx)
    {
        char *fname = names[idx];
        int enclen = sizeof(namebuf);
        char *encoded = urlencode(fname, strlen(fname), namebuf, &enclen);
        if (encoded)
        {
            printf("<p><a href=\"/index.cgi?%s\">%s</a></p>", encoded, fname);
        }
    }

    printf("</body></html>");
    printf("<!--可恶的助手，把我伟大的未来道具8号机从首页上撤掉了。"
           "一定要让阿至给我再放上去！-->");
    exit(0);
}

// The page for flag.txt
void flagtxt()
{
    if (!is_admin)
    {
        printf("Status: 403 Forbidden\n"
               "Content-Type: text/plain\n\n"
               "So you want to access flag.txt? No way!\n");
    }
    else
    {
        printf("Content-Type: text/plain\n\n");
        FILE *fin = fopen("flag.txt", "rb");
        printf("%s\n", fgets(large_buf, sizeof(large_buf), fin));
        fclose(fin);
    }
    exit(0);
}

// The detail page
void detailpage(char *fname)
{
    char namebuf[256];
    char fpath[512];
    int declen = sizeof(namebuf);
    char *decoded = urldecode(fname, strlen(fname), namebuf, &declen);
    strcpy(fpath, "../data");

    if (!decoded)
    {
        diepage(404, "Not Found");
    }
    declen = sizeof(fpath) - strlen(fpath);
    if (!canonical_path(decoded, strlen(decoded), fpath + strlen(fpath),
                        &declen))
    {
        diepage(404, "Not Found");
    }

    FILE *fin = fopen(fpath, "rb");
    if (!fin)
    {
        diepage(404, "Not Found");
    }

    printf("Content-Type: text/html\n\n");
    printf("<html><head>"
           "<meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\">"
           "<title>%s - 未来道具研究所</title></head><body>",
           decoded);

    // Read the file content
    int bytesRead = 0;
    while ((bytesRead = fread(large_buf, 1, sizeof(large_buf), fin)) > 0)
    {
        fwrite(large_buf, 1, bytesRead, stdout);
    }
    printf("</body></html>");
    fclose(fin);
    exit(0);
}

// Main routine to serve the CGI calls.
int main(int argc, char **argv, char **envp)
{
    // load administrator account
    FILE *fadm = fopen("../admin.txt", "rb");
    if (fadm != NULL)
    {
        fscanf(fadm, "%s%s", admuser, admpass);
    }
    fclose(fadm);

    // check authentication
    check_auth();

    // dispatch the request
    if (!getenv("QUERY_STRING") || strcmp(getenv("QUERY_STRING"), "") == 0)
    {
        indexpage();
    }
    else if (strcmp(getenv("QUERY_STRING"), "gallery.jpg") == 0)
    {
        readimage("gallery.jpg");
    }
    else if (strcmp(getenv("QUERY_STRING"), "flag.txt") == 0)
    {
        flagtxt();
    }
    else
    {
        detailpage(getenv("QUERY_STRING"));
    }
    return 0;
}
