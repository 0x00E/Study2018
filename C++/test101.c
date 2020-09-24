#include<stdio.h>
#define M 10
void main()
{
int low=0,mid,high=9,found=0,i,j,t,x,a[M]={1,2,34,4,11,9,6,31,22,10};
for(i=0;i<=9;i++)
{

for(j=9;j>=i+1;j--)
{
if(a[j]<a[j-1])
{
t=a[j];
a[j]=a[j-1];
a[j-1]=t;
}
}
}
printf("please input an interger\n");
scanf("%d",&x);
if(x>=a[0]&&x<=a[9])
{
for(;low>high;)
{
mid=(high+low)/2;
if(x>a[mid])
low=mid+1;
else if(x<a[mid])
high=mid-1;
else
{
printf("x=a[%d]=%d\n",mid,x);
found=1;
break;
}
}
}
else
printf("error input\n");
if(found=0)
printf("not in the array\n");
}
