#include <stdio.h>

void main()
{
	int a[8]={1,22,36,5,99,56,26,23},i,ave,max,min,sum=0;
	max=min=a[i];
	for(i =0;i<8;i++){
		
		sum+=a[i];
		
		if(max<a[i])
			max=a[i];
		if(min>a[i])
			min=a[i];
		
	}
	ave=sum/8;
	printf("���ֵ��%d\n��Сֵ��%d\nƽ��ֵ��%d",max,min,ave);
}
