Attribute VB_Name = "Mod_Net"
Private Declare Function WSAStartup Lib "ws2_32.dll" (ByVal wVersionRequired As Long, lpWSAData As WSAData) As Long
Private Declare Function WSACleanup Lib "ws2_32.dll" () As Long

Private Const WSADESCRIPTION_LEN = 256
Private Const WSASYS_STATUS_LEN = 256
Private Const WSADESCRIPTION_LEN_1 = WSADESCRIPTION_LEN + 1
Private Const WSASYSSTATUS_LEN_1 = WSASYS_STATUS_LEN + 1
Private Const SOCKET_ERROR = -1

Private Type WSAData
    wVersion As Integer
    wHighVersion As Integer
    szDescription As String * WSADESCRIPTION_LEN
    szSystemStatus As String * WSASYS_STATUS_LEN
    iMaxSockets As Integer
    iMaxUdpDg As Integer
    lpVendorInfo As Long
End Type

Private Declare Function socket Lib "ws2_32.dll" (ByVal af As Long, ByVal s_type As Long, ByVal Protocol As Long) As Long
Private Declare Function closesocket Lib "ws2_32.dll" (ByVal s As Long) As Long

Private Const AF_UNSPEC = 0 '/* unspecified */
Private Const AF_UNIX = 1 '/* local to host (pipes, portals) */
Private Const AF_INET = 2 '/* internetwork: UDP, TCP, etc. */
Private Const AF_IMPLINK = 3 '/* arpanet imp addresses */
Private Const AF_PUP = 4 '/* pup protocols: e.g. BSP */
Private Const AF_CHAOS = 5 '/* mit CHAOS protocols */
Private Const AF_NS = 6 '/* XEROX NS protocols */
Private Const AF_IPX = AF_NS '/* IPX protocols: IPX, SPX, etc. */
Private Const AF_ISO = 7 '/* ISO protocols */
Private Const AF_OSI = AF_ISO '/* OSI is ISO */
Private Const AF_ECMA = 8 '/* european computer manufacturers */
Private Const AF_DATAKIT = 9 '/* datakit protocols */
Private Const AF_CCITT = 10 '/* CCITT protocols, X.25 etc */
Private Const AF_SNA = 11 '/* IBM SNA */
Private Const AF_DECnet = 12 '/* DECnet */
Private Const AF_DLI = 13 '/* Direct data link interface */
Private Const AF_LAT = 14 '/* LAT */
Private Const AF_HYLINK = 15 '/* NSC Hyperchannel */
Private Const AF_APPLETALK = 16 '/* AppleTalk */
Private Const AF_NETBIOS = 17 '/* NetBios-style addresses */
Private Const AF_VOICEVIEW = 18 '/* VoiceView */
Private Const AF_FIREFOX = 19 '/* Protocols from Firefox */
Private Const AF_UNKNOWN1 = 20 '/* Somebody is using this! */
Private Const AF_BAN = 21 '/* Banyan */
Private Const AF_ATM = 22 '/* Native ATM Services */
Private Const AF_INET6 = 23 '/* Internetwork Version 6 */
Private Const AF_CLUSTER = 24 '/* Microsoft Wolfpack */
Private Const AF_12844 = 25 '/* IEEE 1284.4 WG AF */
Private Const AF_MAX = 26

Private Const SOCK_STREAM = 1 ' /* stream socket */
Private Const SOCK_DGRAM = 2 ' /* datagram socket */
Private Const SOCK_RAW = 3 ' /* raw-protocol interface */
Private Const SOCK_RDM = 4 ' /* reliably-delivered message */
Private Const SOCK_SEQPACKET = 5 ' /* sequenced packet stream */

Private Const IPPROTO_IP = 0 '/* dummy for IP */
Private Const IPPROTO_ICMP = 1 '/* control message protocol */
Private Const IPPROTO_IGMP = 2 '/* internet group management protocol */
Private Const IPPROTO_GGP = 3 '/* gateway^2 (deprecated) */
Private Const IPPROTO_TCP = 6 '/* tcp */
Private Const IPPROTO_PUP = 12 '/* pup */
Private Const IPPROTO_UDP = 17 '/* user datagram protocol */
Private Const IPPROTO_IDP = 22 '/* xns idp */
Private Const IPPROTO_ND = 77 '/* UNOFFICIAL net disk proto */
Private Const IPPROTO_RAW = 255 '/* raw IP packet */
Private Const IPPROTO_MAX = 256

Private Declare Function connect Lib "ws2_32.dll" (ByVal s As Long, ByRef name As sockaddr_in, ByVal namelen As Long) As Long
Private Declare Function bind Lib "ws2_32.dll" (ByVal s As Long, ByRef name As sockaddr_in, ByRef namelen As Long) As Long
Private Type sockaddr_in
    sin_family As Integer
    sin_port As Integer
    sin_addr As Long
    sin_zero(1 To 8) As Byte
End Type

Private Declare Function listen Lib "ws2_32.dll" (ByVal s As Long, ByVal backlog As Long) As Long
Private Declare Function WSAAsyncSelect Lib "ws2_32.dll" (ByVal s As Long, ByVal hwnd As Long, ByVal wMsg As Long, ByVal lEvent As Long) As Integer

Private Const FD_READ = &H1
Private Const FD_WRITE = &H2
Private Const FD_OOB = &H4
Private Const FD_ACCEPT = &H8
Private Const FD_CONNECT = &H10
Private Const FD_CLOSE = &H20

Private Declare Function Accept Lib "ws2_32.dll" Alias "accept" (ByVal s As Long, ByRef Addr As sockaddr_in, ByRef addrlen As Long) As Long

Private Declare Function Send Lib "ws2_32.dll" Alias "send" (ByVal s As Long, ByRef buf As Any, ByVal buflen As Long, ByVal flags As Long) As Long
Private Declare Function recv Lib "ws2_32.dll" (ByVal s As Long, ByRef buf As Any, ByVal buflen As Long, ByVal flags As Long) As Long

Private Const MSG_OOB = &H1
Private Const MSG_PEEK = &H2
Private Const MSG_DONTROUTE = &H4
Private Const MSG_PARTIAL = &H8000
Private Const MSG_MAXIOVLEN = 16

Private Declare Function inet_addr Lib "ws2_32.dll" (ByVal cp As String) As Long

Private Declare Function htons Lib "ws2_32.dll" (ByVal hostshort As Integer) As Integer
Private Declare Function htonl Lib "ws2_32.dll" (ByVal hostlong As Long) As Long
Private Declare Function ntohl Lib "ws2_32.dll" (ByVal netlong As Long) As Long
Private Declare Function ntohs Lib "ws2_32.dll" (ByVal netshort As Integer) As Integer

Private Const OFFSET_4 = 4294967296#
Private Const MAXINT_4 = 2147483647
Private Const OFFSET_2 = 65536
Private Const MAXINT_2 = 32767

Private Declare Function gethostbyname Lib "ws2_32.dll" (ByVal szHost As String) As HOSTENT
Private Type HOSTENT
    hName As Long
    hAliases As Long
    AddrType As Integer
    hLength As Integer
    hAddrList As Long
End Type

Private Declare Function GetLastError Lib "kernel32" () As Long
Function UnsignedToInteger(Value As Long) As Integer
On Error Resume Next
If Value < 0 Or Value >= OFFSET_2 Then Exit Function
    If Value <= MAXINT_2 Then
        UnsignedToInteger = Value
    Else
        UnsignedToInteger = Value - OFFSET_2
    End If
End Function
Function ConnServer(Host As String, Port As Long) As Long
Dim s As Long
Dim sin As sockaddr_in
sin.sin_port = htons(UnsignedToInteger(Port))
sin.sin_addr = inet_addr(AddrByName(Host))
sin.sin_family = AF_INET
s = socket(AF_INET, SOCK_STREAM, IPPROTO_TCP)
If s = 0 Then Exit Function
If connect(s, sin, Len(sin)) = 0 Then ConnServer = s Else CloseServer s
End Function
Function SendData(s As Long, bData As Long, l As Long) As Long
SendData = Send(s, ByVal bData, l, 0)
End Function
Function RecvData(s As Long) As Long
Dim bData(8191) As Byte
RecvData = recv(s, bData(0), 8192, 0)
End Function
Function Net_Init() As Long
Dim WinsockData As WSAData
Ret = WSAStartup(&H101, WinsockData)
End Function
Function CloseServer(s As Long) As Long
CloseServer = closesocket(s)
End Function

Function SendStrData(s As Long, str As String) As Long
Dim sData
Dim bData() As Byte
sData = Split(str, " ")
ReDim bData(UBound(sData))
For i = 0 To UBound(sData)
    bData(i) = "&h" + sData(i)
Next i
SendStrData = SendData(s, VarPtr(bData(0)), UBound(bData) + 1)
End Function


