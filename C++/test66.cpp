#include <stdio.h>

int main(int argc,char* argv[]){
	int m[10];
	int c=0;
	while(c<10){
		c++;
		m[c]=c*2+1;
		printf("m[%d]=%d",c,m[c]);
	}
} 
