#include <stdio.h>
#include "com_github_qianniancc_JNIDemo.h"  
  
JNIEXPORT void JNICALL Java_com_github_qianniancc_JNIDemo_sayHello (JNIEnv * env, jobject obj)  
{  
printf("Hello World");
}
