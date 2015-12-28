<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Default.aspx.cs" Inherits="_Default" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
	<title>客户项目监控系统</title>
	<link href="css/basiccn.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery.js" type="text/javascript"></script>
    <script language="javascript">
        function getcode(obj)
        {
            var rnd=Math.random();
            $.get(
                "getcode.aspx",
                {
                    id:rnd
                },
                function(data)
                {
                    if (data != "refresh")
                    {
                        obj.value = data;
                    }
                    else
                    {
                        alert('已超时，请重新登陆');
                        location.href = 'default.aspx';
                    }
                }
            );
        }
    </script>
</head>
<body background="images/bg01.jpg">
    <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle"><form id="Form2" name="form1" runat="server">
      <table width="1002" height="600" border="0" cellpadding="0" cellspacing="0" background="images/ind02.jpg">
        <tr>
          <td height="355"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="44%" height="159">&nbsp;</td>
                <td width="56%" align="left" valign="bottom"><table width="274" border="0"  cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="32" width="60"><font color="#FFFFFF">用户名:</font> </td>
                        <td width="214" height="25"><asp:TextBox ID="TextBox1" runat="server" class="input" 
                                Columns="12"></asp:TextBox>                        
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                                ErrorMessage="*" ControlToValidate="TextBox1" Display="Dynamic" 
                                ForeColor="#99CCFF"></asp:RequiredFieldValidator>                        </td>
                      </tr>
                      <tr>
                        <td height="32"><font color="#FFFFFF"> 密&nbsp;&nbsp;码: </font></td>
                      <td height="25"><asp:TextBox ID="TextBox2" TextMode="Password" Columns="12" 
                              class="input" runat="server"></asp:TextBox>                      
                      <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                              ErrorMessage="*" ControlToValidate="TextBox2" Display="Dynamic" 
                              ForeColor="#99CCFF"></asp:RequiredFieldValidator>                      </tr>
                      <tr>
                        <td height="25" colspan="2" align="right"><table width="83%" height="14" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="left"><font color="#FFFFFF"><asp:RadioButtonList ID="RadioButtonList1" runat="server" 
                                RepeatDirection="Horizontal">
                                <asp:ListItem>网思</asp:ListItem>
                                <asp:ListItem Selected="True">客户</asp:ListItem>
                              </asp:RadioButtonList></font></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="33" colspan="2" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="41%" align="right"><asp:ImageButton ImageUrl="images/ind01.jpg" ID="login_submit" runat="server" OnClick="login_submit_Click" /></td>
                              <td width="59%">&nbsp;</td>
                            </tr>
                          </table></td>
                      </tr>
                  </table></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="22"><DIV align="center" class="localthinfont"><span class="tool">技术支持 版权所有</span> &copy; <A href="http://www.webthink.com.cn" target="_blank">网博思创网络技术（北京）有限公司</A></DIV></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</body>
</html>