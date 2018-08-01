// @file: urllib.c
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Contributors:
//   Korepwx              <public@korepwx.com>

#include <string.h>

typedef unsigned char uint8_t;

// Whether a character is unreserved?
static int char_unreserved(char ch)
{
    return (ch >= 'A' && ch <= 'Z') ||
           (ch >= 'a' && ch <= 'z') ||
           (ch >= '0' && ch <= '9') ||
           (ch == '-') ||
           (ch == '_') ||
           (ch == '.') ||
           (ch == '~');
}

// Convert a 0~F integer to hex char
static char int2hex(int v)
{
    if (v < 10)
        return v + '0';
    return v - 10 + 'A';
}

// Whether a char is hex char
static int ishex(char c)
{
    return (c >= 'a' && c <= 'z') ||
           (c >= 'A' && c <= 'Z') ||
           (c >= '0' && c <= '9');
}

// Convert a hex char to int
static int hex2int(char c)
{
    if (c >= 'a' && c <= 'z')
        return c - 'a' + 10;
    if (c >= 'A' && c <= 'Z')
        return c - 'A' + 10;
    return c - '0';
}

// implementation details for urlencode & urldecode
static char *urlencode_detail(char *inbuf, int inlen, char *outbuf, int *outlen,
                              int space_plus)
{
    int inidx = 0;
    int outidx = 0;

    for (; inidx < inlen; ++inidx)
    {
        if (space_plus && inbuf[inidx] == ' ')
        {
            if (outidx + 1 < *outlen)
            {
                outbuf[outidx++] = '+';
            }
            else
            {
                return NULL;
            }
        }
        else if (char_unreserved(inbuf[inidx]))
        {
            if (outidx + 1 < *outlen)
            {
                outbuf[outidx++] = inbuf[inidx];
            }
            else
            {
                return NULL;
            }
        }
        else
        {
            if (outidx + 3 < *outlen)
            {
                outbuf[outidx] = '%';
                outbuf[outidx + 1] = int2hex(((uint8_t)inbuf[inidx]) / 16);
                outbuf[outidx + 2] = int2hex(((uint8_t)inbuf[inidx]) % 16);
                outidx += 3;
            }
            else
            {
                return NULL;
            }
        }
    }
    outbuf[outidx] = 0;
    *outlen = outidx + 1;

    return outbuf;
}

static char *urldecode_detail(char *inbuf, int inlen, char *outbuf, int *outlen,
                              int space_plus)
{
    int inidx = 0;
    int outidx = 0;

    for (; inidx < inlen; ++inidx)
    {
        if (outidx + 1 >= *outlen)
        {
            return NULL;
        }
        if (space_plus && inbuf[inidx] == '+')
        {
            outbuf[outidx++] = ' ';
        }
        else if (inbuf[inidx] == '%' &&
                 inidx + 3 <= inlen &&
                 ishex(inbuf[inidx + 1]) &&
                 ishex(inbuf[inidx + 2]))
        {
            outbuf[outidx++] = hex2int(inbuf[inidx + 1]) * 16 + hex2int(inbuf[inidx + 2]);
            inidx += 2;
        }
        else
        {
            outbuf[outidx++] = inbuf[inidx];
        }
    }
    outbuf[outidx] = 0;
    *outlen = outidx + 1;

    return outbuf;
}

char *urlencode(char *inbuf, int inlen, char *outbuf, int *outlen)
{
    return urlencode_detail(inbuf, inlen, outbuf, outlen, 0);
}

char *urldecode(char *inbuf, int inlen, char *outbuf, int *outlen)
{
    return urldecode_detail(inbuf, inlen, outbuf, outlen, 0);
}

char *urlencode_plus(char *inbuf, int inlen, char *outbuf, int *outlen)
{
    return urlencode_detail(inbuf, inlen, outbuf, outlen, 1);
}

char *urldecode_plus(char *inbuf, int inlen, char *outbuf, int *outlen)
{
    return urldecode_detail(inbuf, inlen, outbuf, outlen, 1);
}

typedef struct
{
    char *s;
    int len;
} PathSection;

char *canonical_path(char *inbuf, int inlen, char *outbuf, int *outlen)
{
    char ch;
    int i, j;
    int inidx = 0, outidx = 0, partidx = 0;
    PathSection parts[64];

    // Split the inbuf into pieces
    memset(parts, 0, sizeof(parts));
    parts[0].s = inbuf;

    for (; inidx < inlen && partidx < 64; ++inidx)
    {
        ch = inbuf[inidx];
        if (ch == '/' || ch == '\\')
        {
            // Deal with ".."
            if (parts[partidx].len == 2 && strncmp(parts[partidx].s, "..", 2) == 0)
            {
                parts[partidx].len = 0;
                if (partidx > 0)
                {
                    parts[--partidx].len = 0;
                }
            }
            // Deal with "."
            else if (parts[partidx].len == 1 && parts[partidx].s[0] == '.')
            {
                parts[partidx].len = 0;
            }

            // If current part contains some string, jump to next part.
            if (parts[partidx].len > 0)
            {
                ++partidx;
            }

            // Store the start of part.
            parts[partidx].s = &inbuf[inidx + 1];
            parts[partidx].len = 0;
        }
        else
        {
            // Store basic string.
            ++parts[partidx].len;
        }
    }

    // Join the discovered pieces.
    if (parts[partidx].len > 0)
    {
        ++partidx;
    }
    for (i = 0; i < partidx; ++i)
    {
        // Add "/"
        if (outidx + 1 >= *outlen)
            return NULL;
        outbuf[outidx++] = '/';

        // Add the part string.
        for (j = 0; j < parts[i].len; ++j)
        {
            if (outidx + 1 >= *outlen)
                return NULL;
            outbuf[outidx++] = parts[i].s[j];
        }
    }

    // Return the joint string.
    outbuf[outidx] = 0;
    *outlen = outidx + 1;

    return outbuf;
}
