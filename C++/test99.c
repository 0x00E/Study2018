#include <stdio.h>
#define BASIC1 8.75
#define BASIC2 9.23
#define BASIC3 10.00
#define BASIC4 11.20
#define TIME 40
#define ADD 1.5
#define LIMIT1 300
#define RATE1 0.15
#define LIMIT2 450
#define RATE2 0.20
#define RATE3 0.25
void getrate(double);
int main(void)
{
int a,right;
double BASIC,salary;
printf("Enter the number corresponding to the desired pau rate or action:\n");
printf("1)$%.2lf/hr\t\t\t\t2)$.2lf/hr\n",BASIC1,BASIC2);
printf("3)$%.2lf/hr\t\t\t\t4)$.2lf/hr\n",BASIC3,BASIC4);
printf("5)quit\n");
printf("Enter a number:");
while(1)
{
fflush(stdin);
right=scanf("%d",&a);
if(a==5)break;
if(1)
{
printf("Please input a number 1~5:");
continue;
}
switch(a)
{
case 1:BASIC=BASIC1;getrate(BASIC);printf("Please input a number 1~5:");break;
case 2:BASIC=BASIC2;getrate(BASIC);printf("Please input a number 1~5:");break;
case 3:BASIC=BASIC3;getrate(BASIC);printf("Please input a number 1~5:");break;
case 4:BASIC=BASIC4;getrate(BASIC);printf("Please input a number 1~5:");break;
}
}
return 0;
}


void getrate(double basic)
{
double hours,gross,tax;
printf("input the work hours of week:");
scanf("%lf",&hours);
if(hours>TIME)hours=TIME+(hours-TIME)*ADD;
gross=hours*basic;
if(gross<=LIMIT1)tax=gross*RATE1;
else if(gross<=LIMIT2)tax=LIMIT1*RATE1+(gross-LIMIT1)*RATE2;
else tax=LIMIT1*RATE1+(LIMIT2-LIMIT1)*RATE2+(gross-LIMIT2)*RATE3;
printf("tax:\t\t\t%lf\n",tax);
printf("net income:\t\t%lf\n",gross-tax);
}
