#include<stdio.h>  
int main() 
{  
    int n,m,z;
    z=n;
    scanf("%d",&n);
    while(n){
        n/=10;
        m++;
    }
    int c[m];
    int i=0;
	for(i=0;i<sizeof(c) / sizeof(c[0]);i++){
	
		c[i]=z;
		z/=10;
	
	
	}
    /*
    for(i=0;i<m-1;i++)                             //从a[0]开始循环到a[9]
    {
        r=i;                                       //i = 0赋值给r，r = 0
        for(j=i+1;j<m;j++)                         /*最巧妙的在这里，内嵌for循环只控制了一个if语句，if语句控制r = j；结合下面的if语句就是第一个轮流跟后面每一个比较
                                                   然后换掉下标，直到比它小的为止，如果比a[0]大的话就不换，继续执行外循环
 
        if(a[j]<a[r])
                 r=j;
        if(r!=i)                                   //如果内循环中的r = j执行了，那么会把比a[0]大的元素位置呼唤，循环9次，就能把所有的数换过来
        {
            temp=a[r];a[r]=a[i];
			a[i]=temp;
        }
    }
    */
    printf("%d",c);
    return 0;
}
/*
输出： 
12345
54321
*/
