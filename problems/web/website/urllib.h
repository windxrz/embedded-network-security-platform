// @file: urllib.h
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// Contributors:
//   Korepwx              <public@korepwx.com>

#ifndef URLLIB_H_D1393B6E0C4011E4857784383555E6CC
#define URLLIB_H_D1393B6E0C4011E4857784383555E6CC

// Encode plain to target in url encoding. If target is sufficient, conversion
// will stop, and NULL will be returned. The final size of outbuf will be
// placed in *outlen.
//
// In urlencode, inbuf and outbuf cannot be same. The returned string should
// always be NULL-terminated.
char *urlencode(char *inbuf, int inlen, char *outbuf, int *outlen);

// Decode encoded to target in url encoding. inbuf and outbuf can be same.
char *urldecode(char *inbuf, int inlen, char *outbuf, int *outlen);

// Same with urlencode, but convert space to plus.
char *urlencode_plus(char *inbuf, int inlen, char *outbuf, int *outlen);

// Same with urldecode, but convert plus to space.
char *urldecode_plus(char *inbuf, int inlen, char *outbuf, int *outlen);

// Get the canonical path of inbuf, which does not contain ".", ".." or
// continous "/".
char *canonical_path(char *inbuf, int inlen, char *outbuf, int *outlen);

#endif // URLLIB_H_D1393B6E0C4011E4857784383555E6CC
