using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace CurrencyConverterApp
{
    public partial class WebFormConverter : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            ServiceReference.WebService1SoapClient klijent = new ServiceReference.WebService1SoapClient("WebService1Soap");
            int num = int.Parse(inputBroj.Text);
            string curr1 = Curr1.SelectedValue;
            string curr2 = Curr2.SelectedValue;
            float rezultat = 0;
            if (curr1 == "BAM" && curr2 == "EUR")
            {
                rezultat = klijent.BamToEur(num);
            }
            else if (curr1 == "EUR" && curr2 == "BAM")
            {
                rezultat = klijent.EurToBam(num);
            }

            Label1.Text = "rezultat je: " + rezultat;
        }
    }
}