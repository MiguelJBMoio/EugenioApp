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
    public class SessaosController : ControllerBase
    {
        private readonly Sql11592069Context _context;

        public SessaosController(Sql11592069Context context)
        {
            _context = context;
        }

        // GET: api/Sessaos
        [HttpGet]
        public async Task<ActionResult<IEnumerable<Sessao>>> GetSessaos()
        {
            return await _context.Sessaos.ToListAsync();
        }

        // GET: api/Sessaos/5
        [HttpGet("{id}")]
        public async Task<ActionResult<Sessao>> GetSessao(int id)
        {
            var sessao = await _context.Sessaos.FindAsync(id);

            if (sessao == null)
            {
                return NotFound();
            }

            return sessao;
        }

        // PUT: api/Sessaos/5
        // To protect from overposting attacks, see https://go.microsoft.com/fwlink/?linkid=2123754
        [HttpPut("{id}")]
        public async Task<IActionResult> PutSessao(int id, Sessao sessao)
        {
            if (id != sessao.PkSessao)
            {
                return BadRequest();
            }

            _context.Entry(sessao).State = EntityState.Modified;

            try
            {
                await _context.SaveChangesAsync();
            }
            catch (DbUpdateConcurrencyException)
            {
                if (!SessaoExists(id))
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

        // POST: api/Sessaos
        // To protect from overposting attacks, see https://go.microsoft.com/fwlink/?linkid=2123754
        [HttpPost]
        public async Task<ActionResult<Sessao>> PostSessao(Sessao sessao)
        {
            _context.Sessaos.Add(sessao);
            await _context.SaveChangesAsync();

            return CreatedAtAction("GetSessao", new { id = sessao.PkSessao }, sessao);
        }

        // DELETE: api/Sessaos/5
        [HttpDelete("{id}")]
        public async Task<IActionResult> DeleteSessao(int id)
        {
            var sessao = await _context.Sessaos.FindAsync(id);
            if (sessao == null)
            {
                return NotFound();
            }

            _context.Sessaos.Remove(sessao);
            await _context.SaveChangesAsync();

            return NoContent();
        }

        private bool SessaoExists(int id)
        {
            return _context.Sessaos.Any(e => e.PkSessao == id);
        }
    }
}
