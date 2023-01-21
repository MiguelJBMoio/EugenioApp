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
    public class ConfiguracaosController : ControllerBase
    {
        private readonly Sql11592069Context _context;

        public ConfiguracaosController(Sql11592069Context context)
        {
            _context = context;
        }

        // GET: api/Configuracaos
        [HttpGet]
        public async Task<ActionResult<IEnumerable<Configuracao>>> GetConfiguracaos()
        {
            return await _context.Configuracaos.ToListAsync();
        }

        // GET: api/Configuracaos/5
        [HttpGet("{id}")]
        public async Task<ActionResult<Configuracao>> GetConfiguracao(int id)
        {
            var configuracao = await _context.Configuracaos.FindAsync(id);

            if (configuracao == null)
            {
                return NotFound();
            }

            return configuracao;
        }

        // PUT: api/Configuracaos/5
        // To protect from overposting attacks, see https://go.microsoft.com/fwlink/?linkid=2123754
        [HttpPut("{id}")]
        public async Task<IActionResult> PutConfiguracao(int id, Configuracao configuracao)
        {
            if (id != configuracao.PkConfiguracao)
            {
                return BadRequest();
            }

            _context.Entry(configuracao).State = EntityState.Modified;

            try
            {
                await _context.SaveChangesAsync();
            }
            catch (DbUpdateConcurrencyException)
            {
                if (!ConfiguracaoExists(id))
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

        // POST: api/Configuracaos
        // To protect from overposting attacks, see https://go.microsoft.com/fwlink/?linkid=2123754
        [HttpPost]
        public async Task<ActionResult<Configuracao>> PostConfiguracao(Configuracao configuracao)
        {
            _context.Configuracaos.Add(configuracao);
            await _context.SaveChangesAsync();

            return CreatedAtAction("GetConfiguracao", new { id = configuracao.PkConfiguracao }, configuracao);
        }

        // DELETE: api/Configuracaos/5
        [HttpDelete("{id}")]
        public async Task<IActionResult> DeleteConfiguracao(int id)
        {
            var configuracao = await _context.Configuracaos.FindAsync(id);
            if (configuracao == null)
            {
                return NotFound();
            }

            _context.Configuracaos.Remove(configuracao);
            await _context.SaveChangesAsync();

            return NoContent();
        }

        private bool ConfiguracaoExists(int id)
        {
            return _context.Configuracaos.Any(e => e.PkConfiguracao == id);
        }
    }
}
