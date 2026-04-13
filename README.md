# Ecos do Passado

Um sistema web desenvolvido em **PHP** que combina um **portal de notícias** com uma seção interativa de **eventos históricos**, permitindo que usuários publiquem conteúdos e explorem acontecimentos marcantes do passado.

---

## Funcionalidades

### Sistema de Usuário
- Cadastro e login de usuários
- Upload de foto de perfil
- Menu de perfil com:
  - Editar conta
  - Excluir conta
  - Logout

---

### Notícias
- Listagem de notícias na página inicial
- Criação de novas notícias (usuários logados)
- Edição e exclusão apenas pelo autor
- Visualização completa da notícia

---

### Hoje na História
- Exibição de eventos históricos do dia atual
- Página dedicada com:
  - Eventos de hoje
  - Eventos de ontem
- CRUD completo de eventos históricos (para usuários logados)

---

## Estrutura do Projeto

/Projeto
│
├── index.php
├── style.css
├── js.js
│
├── /dao
│   ├── NoticiaDAO.php
│   └── HistoriaDAO.php
│
├── /views
│   ├── hoje.php
│   ├── criar_noticia.php
│   ├── editar_noticia.php
│   ├── ver_noticia.php
│   ├── criar_historia.php
│   ├── editar_historia.php
│   ├── excluir_historia.php
│   ├── login.php
│   └── verificarcadastro.php
│
├── /controllers
│   ├── excluir_noticia.php
│   ├── excluir_usuario.php
│   └── logout.php
│
├── /uploads
│   └── (imagens de usuários)
│
└── /assets
    └── ícones do sistema

---

## Tecnologias Utilizadas

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- PDO

---

## Regras de Negócio

- Apenas usuários autenticados podem:
  - Criar notícias
  - Criar/editar/excluir eventos históricos
- Apenas o autor da notícia pode editá-la ou excluí-la
- Imagens de perfil são armazenadas na pasta `/uploads`
- Caso não haja imagem, é usada uma padrão

---

## Banco de Dados (Resumo)

### usuarios
- id
- email
- senha
- imagem

### noticias
- id
- titulo
- conteúdo
- data
- autor

### historia
- id
- evento
- data_historica
- imagem
- usuario_id

---

## Como Executar

1. Coloque o projeto no XAMPP:
C:\xampp\htdocs\Projeto

2. Inicie Apache e MySQL

3. Crie o banco no phpMyAdmin

4. Configure:
config/database.php

5. Acesse:
http://localhost/ProjetoFinal/index.php

---

## Melhorias Futuras

- Comentários nas notícias
- Sistema de curtidas
- Busca
- Filtro por data
- Upload de imagens nas notícias
- Responsividade

---

## Autor

Klint Burzlaff berta Lemes - 17y
