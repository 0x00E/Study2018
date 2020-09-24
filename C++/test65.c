#include<stdio.h>
#include<stdlib.h>
#include<string.h>
#include<conio.h>
#define N 50


struct student
{
char name[20];
char sex[20];
char college[20];
char item[20];
char ranking[20];
}stu[N];
void printf_face1() //定义一个面向用户的输出函数
{
printf("\n\t姓名\t性别\t学院\t\t项目\t\t名次\n");
}
void printf_face() //定义一个面向用户的输出函数
{
printf("\n\t序号\t姓名\t性别\t学院\t\t项目\t\t名次\n");
}
void printf_one(int i) //定义一个输出函数
{
printf("\t%s\t%s\t%s\t\t%s\t\t%s", stu[i].name, stu[i].sex, stu[i].college, stu[i].item, stu[i].ranking);
}


void input(int i) //输入数据
{
printf_face1(); printf("\t");
scanf("\t%s\t%s\t%s\t\t%s\t\t%s", stu[i].name, stu[i].sex, stu[i].college, stu[i].item, stu[i].ranking);
}
void printf_back() //返回上一界面
{
menu();
printf("\n\n\t___.已完成. ___\n\n");
getchar();
getchar();
getchar();
menu();
}
void save(int n) //存入数据
{
FILE *fp; int i;
if ((fp = fopen("file", "wb")) == NULL)
{
printf("\n无法打开文件\n");
exit(0);
}
for (i = 0; i<n; i++)
if (stu[i].name[0] != '\0')
if (fwrite(&stu[i], sizeof(struct student), 1, fp) != 1) //结构体依次写入文件，若写入失败则返回非0值
printf("文件写入错误r\n");
fclose(fp);
}
int load() //打开本地已存入的数据
{
FILE *fp;
int i;
if ((fp = fopen("file", "rb")) == NULL)
{
printf("\n无法打开文件\n");
exit(0);
}
for (i = 0; !feof(fp); i++)
fread(&stu[i], sizeof(struct student), 1, fp);
fclose(fp);
return(i - 1);
}
void enter() //输入原始数据
{
int i, n;
printf("请输入人数(0-%d)?:", N - 1);
scanf("%d", &n);
printf("请输入数据:\n");
for (i = 0; i<n; i++)
{
printf("\n输入第 %d个记录.\n", i + 1);
input(i);
}
if (i != 0) save(n);
printf_back();
}


void find() //查找函数//
{
char fs[20];
int i, n;
n = load();
printf("输入你要查找运动员的学院或姓名:");
scanf("%s", &fs);
for (i = 0; i<n; i++)
{
if (strcmp(stu[i].college, fs) == 0)
{
printf("你要找的运动员已找到:\n");
printf_face1();
printf_one(i);
}
else if (strcmp(stu[i].name, fs) == 0)
{
printf("你要找的运动员已找到:\n");
printf_face1();
printf_one(i);
}
else
{
printf("你要找的运动员未找到!\n");
}
}
getchar();
getchar();
menu();
}
void scorer() //团体总分//
{
int i,n, sum = 0, x;
char fs[20];
n = load();
printf("输入你要查找院系:");
scanf("%s", &fs);
for (i = 0; i<n; i++)
{
if (strcmp(stu[i].college, fs) == 0)
{
printf_face1();
printf_one(i);
if (stu[i].ranking == 1) x = 7;
else if (stu[i].ranking == 2) x = 5;
else if (stu[i].ranking == 3) x = 3;
else if (stu[i].ranking == 4) x = 2;
else if (stu[i].ranking == 5) x = 1;
else x = 0;
sum = sum + x;
}


}
printf("\n总分%d:\n", sum);
getchar();
getchar();
getchar();
menu();
}
void menu() //主界面
{
int n, w1;
do {
system("cls");
puts("\t\t*********************菜 单************************\n\n ");
puts("\t\t*******************1.新 建************************\n\n ");
puts("\t\t*******************2.查 找************************\n\n ");
puts("\t\t*******************3.团体总分报表************************\n\n ");
puts("\t\t*******************4.退 出************************\n\n ");
puts("\n\n\t\t************ ***运动会管理系统*********************** ");
printf("请选择服务种类(1-4) : [ ]\b\b");
scanf("%d", &n);
if (n<1 || n>4)
{
w1 = 1; getchar();
}
else w1 = 0;
} while (w1 == 1);
switch (n)
{
case 1: enter(); break;
case 2: find(); break;
case 3: scorer(); break;
case 6: exit(0);
}
}
void main() //主函数
{
menu();
}

