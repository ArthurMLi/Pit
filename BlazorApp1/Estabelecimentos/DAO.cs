using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ControleDeEstabelecimentos.Dados
{
    internal class DAO<T> where T : class
    {
        private readonly Contexto context;

        public DAO(Contexto contexto)
        {
            this.context = contexto;
        }

        public IEnumerable<T> ObterTodos()
        {
            return this.context.Set<T>().ToList();
        }

        public void CriarNovoItem(T novoItem)
        {
            this.context.Set<T>().Add(novoItem);
            this.context.SaveChanges();
        }

        public void ExcluirItem(T item)
        {
            this.context.Set<T>().Remove(item);
            this.context.SaveChanges();
        }

        public void AlterarItem(T itemAlterar)
        {
            this.context.Set<T>().Update(itemAlterar);
            this.context.SaveChanges();
        }
    }
}
