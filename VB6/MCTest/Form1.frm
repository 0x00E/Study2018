VERSION 5.00
Begin VB.Form Form1 
   BorderStyle     =   1  'Fixed Single
   Caption         =   "MinecraftMOTD压测工具"
   ClientHeight    =   7320
   ClientLeft      =   45
   ClientTop       =   330
   ClientWidth     =   5400
   LinkTopic       =   "Form1"
   MaxButton       =   0   'False
   MinButton       =   0   'False
   ScaleHeight     =   7320
   ScaleWidth      =   5400
   StartUpPosition =   1  '所有者中心
   Begin VB.CommandButton Command4 
      Caption         =   "读取"
      Height          =   600
      Left            =   3360
      TabIndex        =   11
      Top             =   5880
      Width           =   1920
   End
   Begin VB.CommandButton Command3 
      Caption         =   "保存"
      Height          =   600
      Left            =   240
      TabIndex        =   10
      Top             =   5880
      Width           =   1800
   End
   Begin VB.CommandButton Command1 
      Caption         =   "开始压测"
      Height          =   600
      Left            =   240
      TabIndex        =   9
      Top             =   6600
      Width           =   5000
   End
   Begin VB.CommandButton Command2 
      Caption         =   "STOP"
      Height          =   255
      Left            =   3720
      TabIndex        =   8
      Top             =   4680
      Width           =   975
   End
   Begin VB.Timer Timer1 
      Enabled         =   0   'False
      Interval        =   1000
      Left            =   4920
      Top             =   4680
   End
   Begin VB.TextBox Text3 
      Height          =   270
      Left            =   960
      TabIndex        =   5
      Text            =   "20"
      Top             =   4680
      Width           =   615
   End
   Begin VB.TextBox Text2 
      Height          =   270
      Left            =   4080
      TabIndex        =   1
      Text            =   "25565"
      Top             =   4320
      Width           =   1095
   End
   Begin VB.TextBox Text1 
      Height          =   270
      Left            =   600
      TabIndex        =   0
      Text            =   "127.0.0.1"
      Top             =   4320
      Width           =   2535
   End
   Begin VB.Image Image1 
      Height          =   3690
      Left            =   360
      Picture         =   "Form1.frx":0000
      Stretch         =   -1  'True
      Top             =   360
      Width           =   4680
   End
   Begin VB.Label Label5 
      Caption         =   "当前连接数: 0"
      Height          =   255
      Left            =   2040
      TabIndex        =   7
      Top             =   4800
      Width           =   1455
   End
   Begin VB.Label Label4 
      Caption         =   "上传速度:0KB/s 下载速度:0KB/s"
      Height          =   255
      Left            =   240
      TabIndex        =   6
      Top             =   5040
      Width           =   3615
   End
   Begin VB.Label Label3 
      Caption         =   "线程:"
      Height          =   255
      Left            =   240
      TabIndex        =   4
      Top             =   4680
      Width           =   615
   End
   Begin VB.Label Label2 
      Caption         =   "端口:"
      Height          =   255
      Left            =   3480
      TabIndex        =   3
      Top             =   4320
      Width           =   615
   End
   Begin VB.Label Label1 
      Caption         =   "IP:"
      Height          =   255
      Left            =   240
      TabIndex        =   2
      Top             =   4320
      Width           =   375
   End
End
Attribute VB_Name = "Form1"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Private Sub Command1_Click()
    Dim ThreadID As Long
    Dim Ret As Long
    If CStr(Val(Text2.Text)) <> Text2.Text Then MsgBox "端口必须是数字!", 48: Exit Sub
    If CStr(Val(Text3.Text)) <> Text3.Text Then MsgBox "线程必须是数字!", 48: Exit Sub
    Host = Text1.Text
    Port = Text2.Text
    Command1.Enabled = False
    For i = 1 To Text3.Text
        Ret = CreateThread(ByVal 0&, ByVal 0&, AddressOf ThreadCall, ByVal 0, 0, ThreadID)
    Next i
End Sub


Private Sub Command3_Click()
    Dim wss As Object
    Set wss = CreateObject("WScript.Shell")
    wss.RegWrite "HKCU\Software\qianniancc\race\ip", Text1.Text, "REG_SZ"
    wss.RegWrite "HKCU\Software\qianniancc\race\port", Text2.Text, "REG_SZ"
    wss.RegWrite "HKCU\Software\qianniancc\race\thread", Text3.Text, "REG_SZ"
End Sub

Private Sub Command4_Click()
    Dim wss As Object
    Set wss = CreateObject("WScript.Shell")
    Text1.Text = wss.RegRead("HKCU\Software\qianniancc\race\ip")
    Text2.Text = wss.RegRead("HKCU\Software\qianniancc\race\port")
    Text3.Text = wss.RegRead("HKCU\Software\qianniancc\race\thread")
End Sub

Private Sub Timer1_Timer()
    Label4.Caption = "上传速度:" & Int(up / 1024) & "KB/s 下载速度:" & Int(down / 1024) & "KB/s"
    up = 0: down = 0
    Label5.Caption = "当前连接数: " & conn
End Sub
