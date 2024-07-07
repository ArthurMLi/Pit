using Microsoft.EntityFrameworkCore;
using ControleDeEstabelecimentos.Modelos;
namespace ControleDeEstabelecimentos.Dados
{
    public class Contexto : DbContext
    {
        public Contexto(DbContextOptions options) : base(options) { }

        public DbSet<Conta> Conta { get; set; }
        public DbSet<Gerente> Gerentes { get; set; }
        public DbSet<Estabelecimento> Estabelecimentos { get; set; }
    }
}
