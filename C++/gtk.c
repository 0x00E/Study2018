#include <stdio.h>

int main(void)
{
int k=0,m,i=1;
printf("请输入一个整数: ");
scanf("%d",&m);
for(i=2;i<m;i++)
{
	if(m%i==0){
		k=1;
	}
}
if(k==0)
printf("是素数\n");
else
printf("不是素数\n");
}
