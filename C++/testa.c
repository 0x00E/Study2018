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
	printf("最大值是%d\n最小值是%d\n平均值是%d",max,min,ave);
}
