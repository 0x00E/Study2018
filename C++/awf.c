#include <stdio.h>

int main(void)
{
	int i,j,k,n,count=0;
	printf("Ë®ÏÉ»¨Êý:\n");
	for (n=100; n<1000; n++) 
	{
		i=n/100;
		j=(n-i*100)/10;
		k=n%10;
		if(i*i*i+j*j*j+k*k*k==n)
		{
			count++;
			if(count==2){
				printf("%d ",n);
				break;
			}
		}
	}
}
