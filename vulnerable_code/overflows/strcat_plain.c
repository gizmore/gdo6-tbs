#include <string.h>
#include <stdio.h>

#define BUFFERSIZE	128

int main(int argc, char **argv){
     char buffer[BUFFERSIZE] = "bright-shadows.net is ";

     if(argc < 2){
      printf("You have to submit a positive adjective :-)\n");
      exit(1);
     }

     strcat(buffer, argv[1]);
     printf("%s\n", &buffer);

     return 0;
}
