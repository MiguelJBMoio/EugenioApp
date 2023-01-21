using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;
using EugenioApp.Entities;

namespace EugenioApp.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class ClassificacaosController : ControllerBase
    {
        private readonly Sql11592069Context _context;

        public ClassificacaosController(Sql11592069Context context)
        {
            _context = context;
        }

        // GET: api/Classificacaos
        [HttpGet]
        public async Task<ActionResult<IEnumerable<Classificacao>>> GetClassificacaos()
        {
            return await _context.Classificacaos.ToListAsync();
        }

        // GET: api/Classificacaos/5
        [HttpGet("{id}")]
        public async Task<ActionResult<Classificacao>> GetClassificacao(int id)
        {
            var classificacao = await _context.Classificacaos.FindAsync(id);

            if (classificacao == null)
            {
                return NotFound();
            }

            return classificacao;
        }

        // PUT: api/Classificacaos/5
        // To protect from overposting attacks, see https://go.microsoft.com/fwlink/?linkid=2123754
        [HttpPut("{id}")]
        public async Task<IActionResult> PutClassificacao(int id, Classificacao classificacao)
        {
            if (id != classificacao.PkClassificacao)
            {
                return BadRequest();
            }

            _context.Entry(classificacao).State = EntityState.Modified;

            try
            {
                await _context.SaveChangesAsync();
            }
            catch (DbUpdateConcurrencyException)
            {
                if (!ClassificacaoExists(id))
                {
                    return NotFound();
                }
                else
                {
                    throw;
                }
            }

            return NoContent();
        }

        // POST: api/Classificacaos
        // To protect from overposting attacks, see https://go.microsoft.com/fwlink/?linkid=2123754
        [HttpPost]
        public async Task<ActionResult<Classificacao>> PostClassificacao(Classificacao classificacao)
        {
            _context.Classificacaos.Add(classificacao);
            await _context.SaveChangesAsync();

            return CreatedAtAction("GetClassificacao", new { id = classificacao.PkClassificacao }, classificacao);
        }

        // DELETE: api/Classificacaos/5
        [HttpDelete("{id}")]
        public async Task<IActionResult> DeleteClassificacao(int id)
        {
            var classificacao = await _context.Classificacaos.FindAsync(id);
            if (classificacao == null)
            {
                return NotFound();
            }

            _context.Classificacaos.Remove(classificacao);
            await _context.SaveChangesAsync();

            return NoContent();
        }

        private bool ClassificacaoExists(int id)
        {
            return _context.Classificacaos.Any(e => e.PkClassificacao == id);
        }
    }
}
