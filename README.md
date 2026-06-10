# Mural de Vagas - Paranaguá

> **Um pouco de história:** Este projeto nasceu em meados de 2017 com o propósito muito específico de dar apoio a um grande grupo de WhatsApp focado no compartilhamento de vagas de emprego na região de Paranaguá e litoral do Paraná. Naquela época, o volume de vagas que circulavam pelo WhatsApp era massivo, e o Mural de Vagas servia como um repositório central organizado para concentrar essas oportunidades. Com o tempo, o fim do grupo original e a dispersão natural dos administradores voluntários levaram o projeto a ser finalizado.
> 
> ⚠️ **Aviso de Portfólio:** Sendo uma ferramenta que cumpriu brilhantemente o seu papel social local no passado, o código original foi preservado e agora disponibilizado livremente como peça de portfólio. Este repositório não tem vínculos com operações governamentais atuais e não manipula dados sensíveis reais.

---

Este repositório contém o código original resgatado, porém **profundamente modernizado e revitalizado** para os padrões atuais. 

O sistema foi remodelado, demonstrando a capacidade de modernizar uma base de código legado sem perder sua essência. Hoje, ele roda perfeitamente em um ambiente conteinerizado usando **Docker Compose**, o que elimina qualquer dor de cabeça com configurações de servidores ou versões de linguagens antigas. Basta rodar os contêineres e o sistema "ganha vida" localmente de forma instantânea.

---

## 🌟 Novidades e Modernizações

### 🤖 Inteligência Artificial (OCR) Modernizada
- O antigo motor de extração de texto de imagens (Tesseract v1) foi completamente descartado.
- Instalamos o **Tesseract.js v5**, o estado da arte gratuito em OCR de código aberto. 
- Adicionamos processamento em *Canvas* (Filtros de Contraste Dinâmico e Escala de Cinza) antes da leitura da inteligência artificial, o que aumentou a precisão da leitura de panfletos de emprego drasticamente.
- O OCR agora roda de forma nativa e integrada dentro do painel do Administrador, não apenas na página pública.

### 🎨 UI/UX Redesenhada
- **Painel Administrativo Elegante:** O dashboard foi refinado com cartões estilizados, layout *widescreen* e espaçamentos padronizados (Bootstrap modificado).
- **Barra Lateral Inteligente (Sidebar):** O menu agora possui "memória de estado" (via `localStorage`), garantindo que ele não fique "piscando" ou fechando sozinho ao navegar pelas páginas.
- **Micro-interações:** Hover effects aprimorados e feedbacks visuais em tempo real usando Modais/Alertas nativos do Bootstrap.

### ⚙️ Funcionalidades de Moderação
- Administradores agora possuem um formulário limpo de **Postagem Direta**, inserindo vagas imediatamente no banco de dados (`status='liberado'`), pulando a esteira de aprovação (pendentes).
- **Gerenciamento de Usuários (CRUD):** Criada uma nova área administrativa para adicionar, visualizar, editar e remover outros administradores do painel de forma segura e padronizada.

---

## 🛠️ Tecnologias Utilizadas

- **Backend:** PHP nativo
- **Database:** MySQL
- **Frontend:** HTML5, Vanilla CSS, JavaScript (jQuery + Tesseract.js v5)
- **Infraestrutura:** Docker & Docker Compose

---

## 📂 Estrutura de Pastas

* `/src/` — Contém todo o código-fonte da aplicação PHP e seus subdiretórios (como `/adm/` para o painel de controle).
* `/database/` — Contém o dump SQL para a inicialização automática das tabelas e do usuário administrador padrão no banco de dados pelo Docker.
* `docker-compose.yml` — Arquivo de orquestração do ambiente.

---

## 🚀 Como Rodar o Projeto

1. Certifique-se de ter o [Docker](https://www.docker.com/) e o Docker Compose instalados na sua máquina.
2. Clone este repositório:
   ```bash
   git clone https://github.com/correaito/mural_vagas.git
   ```
3. Na raiz do projeto, suba os contêineres:
   ```bash
   docker compose up -d
   ```
4. Acesse o sistema pelo seu navegador em `http://localhost:8081`.

### 🔑 Como Criar o Primeiro Acesso (Admin)

Por questões de segurança e portfólio limpo, o banco de dados vem completamente vazio de usuários (sem senhas padrão em código-fonte). 

Para criar o seu **primeiro usuário administrador**, com o Docker rodando, abra um novo terminal e execute o seguinte comando inserindo direto no MySQL do contêiner:

```bash
docker compose exec db mysql -u root -proot corre034_wordpress -e "INSERT INTO user (id, usuario, senha) VALUES (1, 'admin', 'admin123');"
```

Pronto! Agora você pode acessar o Painel Administrativo usando `admin` e `admin123`. Os próximos administradores você pode cadastrar direto pela tela amigável de **Gerenciar Usuários** dentro do painel!
