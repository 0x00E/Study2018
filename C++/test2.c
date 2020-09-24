#include<stdio.h>
#include<windows.h>
int main(void)
{
	int i, j, k, n, t, temp,a[20],o,p,v,b;
	printf("N=");
	scanf_s("%d", &n);
	for (i = 1; i <= n; i++)
	{
		printf("n%d=", i);
		scanf_s("%d", &a[i]);
	} 
	for (j = 1; j <= n; j++)
	{
		v = a[j] / 2;
		for (k = j + 1; k <= n; k++)
			{
			b = a[k] / 2;
			if (v == 0 && b == 0)
			{
				if (a[j] < a[k])temp = a[j]; a[j] = a[k]; a[k] = temp;
			}
			if (v != 0 && b != 0)
			{
				if (a[j] > a[k])t = a[j]; a[j] = a[k]; a[k] = t;
			}
		}
	}
	printf("odd");
	for (o = 1; o <= n; o++)
	{
		if (a[o] / 2!= 0)printf(" %d ", a[o]);
	}
	printf("\nEven");
	for (p = 1; p <= n; p++)
	{
		if (a[p] / 2 == 0)printf(" %d ",a[p]);
	}
	printf("\n");
	system("pause");
}
