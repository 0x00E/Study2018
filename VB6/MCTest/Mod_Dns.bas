Attribute VB_Name = "Mod_Dns"
Private Type HOSTENT
     hName As Long
     hAliases As Long
     hAddrType As Integer
     hLength As Integer
     hAddrList As Long
     End Type
 Public Declare Function gethostbyname Lib "WSOCK32.DLL" _
 (ByVal szHost As String) As Long
 
Public Declare Sub RtlMoveMemory Lib "kernel32" _
 (hpvDest As Any, _
 ByVal hpvSource As Long, _
 ByVal cbCopy As Long)
 


Public Function AddrByName(ByVal strHost As String) As String
     On Error Resume Next
     Dim hostent_addr As Long
     Dim hst As HOSTENT
     Dim hostip_addr As Long
     Dim temp_ip_address() As Byte
     Dim i As Integer
     Dim ip_address As String
     
     hostent_addr = gethostbyname(strHost)
     If hostent_addr = 0 Then
         Exit Function
     End If
     RtlMoveMemory hst, hostent_addr, LenB(hst)
     RtlMoveMemory hostip_addr, hst.hAddrList, 4
     ReDim temp_ip_address(1 To hst.hLength)
     RtlMoveMemory temp_ip_address(1), hostip_addr, hst.hLength
     For i = 1 To hst.hLength
         ip_address = ip_address & temp_ip_address(i) & "."
     Next
     ip_address = Mid(ip_address, 1, Len(ip_address) - 1)
     AddrByName = ip_address
     If Err.Number > 0 Then
         Err.Clear
     End If
 End Function





