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
void printf_face1() //����һ�������û����������
{
printf("\n\t����\t�Ա�\tѧԺ\t\t��Ŀ\t\t����\n");
}
void printf_face() //����һ�������û����������
{
printf("\n\t���\t����\t�Ա�\tѧԺ\t\t��Ŀ\t\t����\n");
}
void printf_one(int i) //����һ���������
{
printf("\t%s\t%s\t%s\t\t%s\t\t%s", stu[i].name, stu[i].sex, stu[i].college, stu[i].item, stu[i].ranking);
}


void input(int i) //��������
{
printf_face1(); printf("\t");
scanf("\t%s\t%s\t%s\t\t%s\t\t%s", stu[i].name, stu[i].sex, stu[i].college, stu[i].item, stu[i].ranking);
}
void printf_back() //������һ����
{
menu();
printf("\n\n\t___.�����. ___\n\n");
getchar();
getchar();
getchar();
menu();
}
void save(int n) //��������
{
FILE *fp; int i;
if ((fp = fopen("file", "wb")) == NULL)
{
printf("\n�޷����ļ�\n");
exit(0);
}
for (i = 0; i<n; i++)
if (stu[i].name[0] != '\0')
if (fwrite(&stu[i], sizeof(struct student), 1, fp) != 1) //�ṹ������д���ļ�����д��ʧ���򷵻ط�0ֵ
printf("�ļ�д�����r\n");
fclose(fp);
}
int load() //�򿪱����Ѵ��������
{
FILE *fp;
int i;
if ((fp = fopen("file", "rb")) == NULL)
{
printf("\n�޷����ļ�\n");
exit(0);
}
for (i = 0; !feof(fp); i++)
fread(&stu[i], sizeof(struct student), 1, fp);
fclose(fp);
return(i - 1);
}
void enter() //����ԭʼ����
{
int i, n;
printf("����������(0-%d)?:", N - 1);
scanf("%d", &n);
printf("����������:\n");
for (i = 0; i<n; i++)
{
printf("\n����� %d����¼.\n", i + 1);
input(i);
}
if (i != 0) save(n);
printf_back();
}


void find() //���Һ���//
{
char fs[20];
int i, n;
n = load();
printf("������Ҫ�����˶�Ա��ѧԺ������:");
scanf("%s", &fs);
for (i = 0; i<n; i++)
{
if (strcmp(stu[i].college, fs) == 0)
{
printf("��Ҫ�ҵ��˶�Ա���ҵ�:\n");
printf_face1();
printf_one(i);
}
else if (strcmp(stu[i].name, fs) == 0)
{
printf("��Ҫ�ҵ��˶�Ա���ҵ�:\n");
printf_face1();
printf_one(i);
}
else
{
printf("��Ҫ�ҵ��˶�Աδ�ҵ�!\n");
}
}
getchar();
getchar();
menu();
}
void scorer() //�����ܷ�//
{
int i,n, sum = 0, x;
char fs[20];
n = load();
printf("������Ҫ����Ժϵ:");
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
printf("\n�ܷ�%d:\n", sum);
getchar();
getchar();
getchar();
menu();
}
void menu() //������
{
int n, w1;
do {
system("cls");
puts("\t\t*********************�� ��************************\n\n ");
puts("\t\t*******************1.�� ��************************\n\n ");
puts("\t\t*******************2.�� ��************************\n\n ");
puts("\t\t*******************3.�����ֱܷ���************************\n\n ");
puts("\t\t*******************4.�� ��************************\n\n ");
puts("\n\n\t\t************ ***�˶������ϵͳ*********************** ");
printf("��ѡ���������(1-4) : [ ]\b\b");
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
void main() //������
{
menu();
}

