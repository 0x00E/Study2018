#include<stdio.h>
#include<stdlib.h>
typedef int DataType;
typedef struct node{
DataType data;
struct node *next;
}ListNode;
ListNode *createlist(int);
float statslistpct(ListNode*,int,int,int);
int main(){
ListNode *p;
int n;
scanf("%d",&n);
p=createlist(n);
printf("%.2f%%\n",statslistpct(p,n,0,18));
printf("%.2f%%\n",statslistpct(p,n,19,35));
printf("%.2f%%\n",statslistpct(p,n,36,60));
printf("%.2f%%\n",100-statslistpct(p,n,0,18)-statslistpct(p,n,19,35)-statslistpct


(p,n,36,60));
return 0;
}
ListNode *createlist(int x){
ListNode *head,*s,*r;
head=(ListNode*)malloc(sizeof(ListNode));
r=head;
while(x--){
s=(ListNode*)malloc(sizeof(ListNode));
scanf("%d",&s->data);
r->next=s;
r=s;
}
r->next=NULL;
return head;
}
float statslistpct(ListNode *head,int x,int a,int b){
int s=0;
while(head->next){
if(head->data>=a&&head->data<=b){
s++;
}
head=head->next;
}
return (s+(head->data>=a&&head->data<=b))*100.0/x;
}
