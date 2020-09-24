/ BJLJ1.cmin_addpp : Defines the entry point for the console application.
//


#include <stdafx.h>
#include "stdio.h"
#include "string.h"
#include "math.h"
#define MAX 100


int len1 = 0,len2 = 0;
int i,j,k;
//int main(int , char*);
void edit_distance(int , int );
int min_add (int ,int ,int );


int main(int argc, char* argv[])
{
char* s1;
char* s2;
printf("input the first string:");
scanf("%s",&s1);
printf("input the second string:");
scanf("%s",&s2);
len1 = strlen(s1);
len2 = strlen(s2);
edit_distance(len1,len2);
printf("Hello World!\n");
return 0;
}


void edit_distance(int len1 , int len2)
{ 
int edit[MAX][MAX];
for(i=0;i<len1;i++)
{
for(j=0;j<len2;j++)
{
if(i==0 && j==0)

edit[0][0] = 0;

else if(i==0 && j>0)

edit[i][j] = j;

else if(i>0 && j==0)

edit[i][j] = i;

else if(i>0 && j>0)

edit[i][j] = min_add(edit[i-1][j-1]+1,edit[i-1][j]+1,edit[i][j-1]+1);
}
}
printf("The distance of the two string is :%d ", edit[len1][len2]);
} 


int min_add(int i,int j,int k)
{
if(i<j)
if(i<k)
return i;

else if(k<i)
return k;


else if(i>j)
if(j>k)
return k;

else if(k>j)
return j;
}
