using ControleDeEstabelecimentos.Modelos;
using BlazorApp1;
using Edmw.ApiInvokerHttpClient;
namespace ControleDeEstabelecimentos.Dados
{
    internal class DAL<T> where T : class
    {

       
        public List<Estabelecimento> ListarE()
        {

            var lista = new List<Estabelecimento>
            {
                new Estabelecimento {}

            };
                return lista;
        }
        public List<Usuario> ListarC()
        {
            var lista = new List<Usuario>
            {
                new Usuario{}

            };
            return lista;
        }
    
    }

   
}
