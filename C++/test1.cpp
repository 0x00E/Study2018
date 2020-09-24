#include <iostream>
#include <string>
using namespace std;

class student
{
string name;
int age;
int math;
int chinese;
int english;
int zongf;
public: 

student(string n="小王",int a=17,int m=78,int c=79,int e=99):name(n),age(a),math(m),chinese(c),english(e){
zongf=math+chinese+english;
}
int maths()
{
int m=math;
return m;
}
int zongfs()
{
int zongfs=zongf;
return zongfs;
}
void print();
};
class ourclass
{

public:
student students[5];
void zongpai();
void zongshuxue();
void zhanshi();
};
void ourclass::zongpai()
{
cout<<"成绩表（按总分从小到大）"<<endl; 
int i,x;
int a=students[i].zongfs();
int b=students[x].zongfs();
for( i=0; i<5-1; i++) 
{ 
x=i; 
for(int j=i+1; j<5; j++) 
{ 
if(a<b) 
x=j; 
}
if(x!=i) 
{ 
int t=b; 
b=a; 
a=t; 
} 
} 

for(int k=0; i<5; i++)
students[k].print();
}
void ourclass::zongshuxue()
{
cout<<"班里同学的数学总成绩为"<<" ";
cout<<students[1].maths()+students[2].maths()+students[3].maths()+students[4].maths()+students[5].maths();cout<<endl;
}

void ourclass::zhanshi()
{
students[1].print();
students[2].print();
students[3].print();
students[4].print();
students[5].print();
}
void student::print()
{ 
cout<<"姓名"<<" "<<name<<" ";
cout<<"年龄"<<" "<<age<<" ";
cout<<"数学成绩"<<" "<<math<<" ";
cout<<"语文成绩"<<" "<<chinese<<" ";
cout<<"英语成绩"<<" "<<english<<" ";
cout<<"总成绩"<<" "<<zongf<<endl;
}
int main()
{
student s1("小王",20,15,85,99);
student s2("小郑",18,89,89,89);
student s3("小梁",17,88,45,67);
student s4("小牛",19,78,79,73);
student s5("小毕",20,72,78,79);
ourclass c1;
c1.students[1]=s1;
c1.students[2]=s2;
c1.students[3]=s3;
c1.students[4]=s4;
c1.students[5]=s5;
c1.zongshuxue();
c1.zongpai();
}
