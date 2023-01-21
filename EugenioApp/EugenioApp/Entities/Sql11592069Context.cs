using System;
using System.Collections.Generic;
using Microsoft.EntityFrameworkCore;

namespace EugenioApp.Entities;

public partial class Sql11592069Context : DbContext
{
    public Sql11592069Context()
    {
    }

    public Sql11592069Context(DbContextOptions<Sql11592069Context> options)
        : base(options)
    {
    }

    public virtual DbSet<Classificacao> Classificacaos { get; set; }

    public virtual DbSet<Configuracao> Configuracaos { get; set; }

    public virtual DbSet<Jogador> Jogadors { get; set; }

    public virtual DbSet<Sessao> Sessaos { get; set; }

    public virtual DbSet<Teste> Testes { get; set; }

    protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder) { }

    protected override void OnModelCreating(ModelBuilder modelBuilder)
    {
        modelBuilder.Entity<Classificacao>(entity =>
        {
            entity.HasKey(e => e.PkClassificacao).HasName("PRIMARY");

            entity.ToTable("Classificacao");

            entity.Property(e => e.PkClassificacao)
                .HasColumnType("int(11)")
                .HasColumnName("PK_Classificacao");
            entity.Property(e => e.PontuacaoFinal)
                .HasColumnType("int(11)")
                .HasColumnName("Pontuacao_Final");
            entity.Property(e => e.QtdCertas)
                .HasColumnType("int(11)")
                .HasColumnName("QTD_Certas");
            entity.Property(e => e.QtdErros)
                .HasColumnType("int(11)")
                .HasColumnName("QTD_Erros");
            entity.Property(e => e.Tempo).HasColumnType("time");
            entity.Property(e => e.Wpm).HasColumnName("WPM");
        });

        modelBuilder.Entity<Configuracao>(entity =>
        {
            entity.HasKey(e => e.PkConfiguracao).HasName("PRIMARY");

            entity.ToTable("Configuracao");

            entity.Property(e => e.PkConfiguracao)
                .HasColumnType("int(11)")
                .HasColumnName("PK_Configuracao");
            entity.Property(e => e.TempoConfiguracao)
                .HasColumnType("time")
                .HasColumnName("Tempo_Configuracao");
            entity.Property(e => e.Texto).HasColumnType("text");
            entity.Property(e => e.Titulo).HasMaxLength(255);
        });

        modelBuilder.Entity<Jogador>(entity =>
        {
            entity.HasKey(e => e.PkJogador).HasName("PRIMARY");

            entity.ToTable("Jogador");

            entity.Property(e => e.PkJogador)
                .HasColumnType("int(11)")
                .HasColumnName("PK_Jogador");
            entity.Property(e => e.Idade).HasColumnType("int(11)");
            entity.Property(e => e.Nome).HasMaxLength(255);
        });

        modelBuilder.Entity<Sessao>(entity =>
        {
            entity.HasKey(e => e.PkSessao).HasName("PRIMARY");

            entity.ToTable("Sessao");

            entity.Property(e => e.PkSessao)
                .HasColumnType("int(11)")
                .HasColumnName("PK_Sessao");
            entity.Property(e => e.DataSessao)
                .HasColumnType("date")
                .HasColumnName("Data_Sessao");
        });

        modelBuilder.Entity<Teste>(entity =>
        {
            entity.HasKey(e => e.PkTeste).HasName("PRIMARY");

            entity.ToTable("Teste");

            entity.HasIndex(e => e.FkClassificacao, "FK_class_PK_class");

            entity.HasIndex(e => e.FkConfiguracao, "FK_config_PK_config");

            entity.HasIndex(e => e.FkJogador, "FK_jogador_PK_jogador");

            entity.HasIndex(e => e.FkSessao, "FK_sessao_PK_sessao");

            entity.Property(e => e.PkTeste)
                .HasColumnType("int(11)")
                .HasColumnName("PK_Teste");
            entity.Property(e => e.FkClassificacao)
                .HasColumnType("int(11)")
                .HasColumnName("FK_Classificacao");
            entity.Property(e => e.FkConfiguracao)
                .HasColumnType("int(11)")
                .HasColumnName("FK_Configuracao");
            entity.Property(e => e.FkJogador)
                .HasColumnType("int(11)")
                .HasColumnName("FK_Jogador");
            entity.Property(e => e.FkSessao)
                .HasColumnType("int(11)")
                .HasColumnName("FK_Sessao");

            entity.HasOne(d => d.FkClassificacaoNavigation).WithMany(p => p.Testes)
                .HasForeignKey(d => d.FkClassificacao)
                .HasConstraintName("FK_class_PK_class");

            entity.HasOne(d => d.FkConfiguracaoNavigation).WithMany(p => p.Testes)
                .HasForeignKey(d => d.FkConfiguracao)
                .HasConstraintName("FK_config_PK_config");

            entity.HasOne(d => d.FkJogadorNavigation).WithMany(p => p.Testes)
                .HasForeignKey(d => d.FkJogador)
                .HasConstraintName("FK_jogador_PK_jogador");

            entity.HasOne(d => d.FkSessaoNavigation).WithMany(p => p.Testes)
                .HasForeignKey(d => d.FkSessao)
                .HasConstraintName("FK_sessao_PK_sessao");
        });

        OnModelCreatingPartial(modelBuilder);
    }

    partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
}
