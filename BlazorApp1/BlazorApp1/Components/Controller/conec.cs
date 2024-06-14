using FireSharp.Config;
using FireSharp.Interfaces;
using FireSharp.Response;









namespace BlazorApp1.Components.Controller
{
    public class conec
    {
        IFirebaseConfig config = new FirebaseConfig
        {
            AuthSecret = "zHUVhTzDbUSYw1TtgwY3Ro7NPWATxSltlHkA49YP",
            BasePath = "https://testefila-70e47-default-rtdb.firebaseio.com/"

        };
        IFirebaseClient cliente;
        cliente = new FireSharp.FirebaseClient(config);
        if(cliente){
            }

    }
}
