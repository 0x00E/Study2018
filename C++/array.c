#include<stdio.h> 
int i,j,k; 
void main()
{
int A[2][2]={{1,1},{2,1}},B[2][2]={{2,1},{1,1}};
int C[2][2]={0};
printf("����A*����BΪ:\n"); //��������������ˣ���[2][2]*[2][1]Ϊ��
for(i=0;i<2;i++) 
{
	for(j=0;j<2;j++)
	{
		for(k=0;k<2;k++)
		C[i][j]+=A[i][k]*B[k][j];
	}
}
for(i=0;i<2;i++) 
{
	for(j=0;j<1;j++){
		//for(i=0;i<12;i++)
		printf("%d\n",*(*C+i));
	}	
}


return 0;
}
