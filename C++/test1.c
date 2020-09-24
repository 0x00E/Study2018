#include <stdio.h>
#include <stdlib.h>
int main()
{
int a=12; 
int b=1; 
int c=a-(b--); // ?
int d=(++a)-(--b); // ?
printf("c=%d, d=%d\n", c, d);

system("pause");
return 0;

}
