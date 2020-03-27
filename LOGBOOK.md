
# Desenvolvimento
## Basic steps
- 0.1.1 Uma limpeza na estrutura da aplicação: arquivos e pastas;
    Apenas exclusão de arquivos e pastas desnecessárias para a aplicação.
    [qui 26 mar 2020 - 21:00:00]

- 0.1.2 Uma organização de desenvolvimento será criada, com nome, flow de versionamento, estrutura de pastas, período, etc.
    Criando estrutura de pastas - esqueleto;
    Estrutura:
      - /CSS
      - /JS
      - /IMG
      - /UTILS
      - index.html
      - .gitignore
      - README.md
      - LOGAPP.md
      - LOGBOOK.md
    [qui 26 mar 2020 - 21:00:00]

- 0.1.3 Um arquivo contento estas informações, documentando;
  - Foram criados, alguns arquivos .md:
    - LOGBOOK.md, que será o diário de bordo;
    - LOGAPP.md, que farei o controle de versões e steps de desenvolvimento;
        Este arquivo, foi pensado como um modelo de configuração do NPM - Node package manager, e será futuramente substituido pelo mesmo, e até mesmo pelo modelo do Composer.
    [qui 26 mar 2020 - 21:30:00]

- 0.1.4 Definindo o versionamento e Flow, e nomeando o branchs;
    Neste passo, irei ajustar à minha realidade de desenvolvimento, as diretrizes do GIT FLOW. Que são algumas sugestões para organização dos branches que serão criados no decorrer do desenvolvimento. Sito a necessidade de proteger meu desenvolvimento de minha própria natureza humana, pois todos erram e as vezes nem percebemos...
    Em meu ultimo local de trabalho contratado, senti na pele o quanto sofriamos para se organizar com arquivos e atualizações de conteúdo. Até que assisti uma <i>Aula dos Deuses</i>, aliás, do Deus Linus Torvalds. Cara, aquilo me transformou completamente. Tudo que vi naquela apresentação foi revolucionário e majestoso! E decidi, vou usá-lo!
    Estudei varios dias e noites o GIT, até ficar bem respaudado de chegar com o nosso diretor e falar: - A partir de agora vamos acabar com o TORMENTO e vamos utilizar o GIT. Ele uma pessoa totalmente receiosa, ficou totalmente achando que eu era louco (e com razão).
    Mas provei que a loucura que estava para fazer seria uma solução definitiva para o TORMENTO que vivíamos. E depois disso, tudo eram flores...
    Mas (esse mas mata um...), como tudo no desenvolvimento é statico, vieram mais responsabilidades e logo apareceu um pequeno tormento, o de Organizar nosso FLOW com o GIT. E tudo parecia que ia piorar quando eu descobrir com o DEUS, a maneira certa de se organizar.
    E é isso que vou começar a implementar para meus desenvolvimentos pequenos ou gigantescos.
    Bom vou Definir uns Branches que acredito irão me ajudar a gerenciar meu desenvolvimento, referenciado pelo GIT FLOW;
    Branches a se criar:
    - MASTER - contém o nosso código de produção, todo o código que estamos desenvolvendo, em algum momento será “juntado” com essa branch;
    - DEVELOP - contém o código do nosso próximo deploy, isso significa que conforme as features vão sendo finalizadas elas vão sendo juntadas nessa branch para posteriormente passarem por mais uma etapa antes de ser juntada com a master;
    - FEATURE/*: são branches para o desenvolvimento de uma funcionalidade específica, por convenção elas tem o nome iniciado por feature/, por exemplo: feature/cadastro-usuarios. Importante ressaltar que essas branches são criadas sempre à partir da branch develop
    - HOTFIX/*: são branches responsáveis pela realização de alguma correção crítica encontrada em produção e por isso são criadas à partir da master. Importante ressaltar que essa branch deve ser juntada tanto com a master quanto com a develop
    - RELEASE/*: tem uma confiança maior que a branch develop e que se encontra em nível de preparação para ser juntada com a master e com a develop (caso alguma coisa tenha sido modificada na branch em questão);

    Bom, esses são os nomes das branchs que serão criadas de acordo com a produção, porém criarei alguns apelidos para simplificar as coisas. E também verei ainda, uma forma de ordena-las ao meu modo.

    É importante ressaltar, que sempre que uma branch hotfix/ ou release/ é mesclada com a master o Git Flow gera automaticamente tags facilitando assim uma eventual necessidade de mudarmos para uma versão mais antiga.

    Naõ utilizarei o plugin do git GIT FLOW, pois vou fazer as coisas na unha primeiramente.
    Este artigo da uma boa visão de utilização bem básica do flow [link](https://tableless.com.br/git-flow-introducao/). Porém eu irei criar provavelmente um arquivo para me ajudar com as anotações desse controle de branches;

    Um arguivo para anotar o que foi criado, em que area de desenvolvimento, a data, se está em vigor ou não, por que ainda não foi terminada, e muito mais. Pretendo chamá-lo de LOGFLOW.md
    Este arquivo será meu "plugin" nesse momento. E nada mais será desenvolvido na MASTER

    E vamos iniciar!
    [qui 26 mar 2020 - 23:47:00]

- 0.1.5 Criando um Historico de desenvolvimento, diário de bordo;
    Bom o arquivo ja esta em uso.
    [qui 26 mar 2020 - 23:48:00]

## Iniciando o Desenvolvimento
- Montando o esqueleto do projeto;

## Entregando a Obra
- 1.0 Comitando o V-Card no Master;
