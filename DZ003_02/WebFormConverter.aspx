<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="WebFormConverter.aspx.cs" Inherits="CurrencyConverterApp.WebFormConverter" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <asp:TextBox ID="inputBroj" runat="server"></asp:TextBox>
            
            <asp:DropDownList ID="Curr1" runat="server" style="margin-left: 31px">
                <asp:ListItem  Value="BAM"></asp:ListItem>
                <asp:ListItem  Value="EUR"></asp:ListItem>
            </asp:DropDownList>
            <asp:DropDownList ID="Curr2" runat="server">
                <asp:ListItem Value="EUR"></asp:ListItem>
                <asp:ListItem Value="BAM"></asp:ListItem>
            </asp:DropDownList>
            
            <asp:Button ID="Button1" runat="server" Height="29px" OnClick="Button1_Click" style="margin-left: 26px" Text="Convert" Width="93px" />
            <br />
            <br />
            <asp:Label ID="Label1" runat="server"></asp:Label>
        </div>
    </form>
</body>
</html>
