using ControleDeEstabelecimenos.Modelos;
namespace ControleDeEstabelecimenos.Dados
{
    internal class DAL
    {
        public List<Estabelecimentos> ListarE()
        {

            var lista = new List<Estabelecimentos>
            {
                new Estabelecimentos {}

            };
                return lista;
        }
        public List<Clientes> ListarC()
        {
            var lista = new List<Clientes>
            {
                new Clientes{}

            };
            return lista;
        }
    
    }
}
