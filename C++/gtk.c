#include <stdio.h>

int main(void)
{
int k=0,m,i=1;
printf("������һ������: ");
scanf("%d",&m);
for(i=2;i<m;i++)
{
	if(m%i==0){
		k=1;
	}
}
if(k==0)
printf("������\n");
else
printf("��������\n");
}
