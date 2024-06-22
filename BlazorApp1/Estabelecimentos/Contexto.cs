using Microsoft.EntityFrameworkCore;
using ControleDeEstabelecimentos.Modelos;
namespace ControleDeEstabelecimentos.Dados
{
    internal class Contexto : DbContext
    {
        public Contexto(DbContextOptions options) : base(options) { }

        public DbSet<Usuario> Usuarios { get; set; }
        public DbSet<Gerente> Gerentes { get; set; }
        public DbSet<Estabelecimento> Estabelecimentos { get; set; }
    }
}
