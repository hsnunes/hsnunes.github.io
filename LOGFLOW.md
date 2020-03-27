## Montando o FLOW do GIT

1 - MASTER:
    - Cria o ramo DEVELOP do MASTER;

2 - DEVELOP (dev)
    - Onde se dará o desenvolvimento;

3 - FEATURES (fea/issueXXX-*)
    - Cria-se as features do Develop. Onde se necessita de alguma funcionalidade;
    - Faz o desenvolvimento do que se planejou
    - Finaliza e Mescla no Develop a Feature Criada;
    - Elimina a branch fea/issueXXX-*
    - Esse processo se repetirá até que todas as features/issues deste RELEASE forem realizadas

4 - RELEASE (rel/vX.X.X)
    - Faz-se necessaŕia a criação desta branch para determinar uma versão da aplicação
    - Que será criada a partir da Develop e mesclada com a master, assim finalizando aquele pacotes de funcionalidades e determinando um ponto de estado da aplicação. Até o momento de se deparar com um posível BUG na produção (HOTFIX);

5 - HOTFIX (hfix)
    - Este será criado diretamente da Master/Produção, para ser resolvido em carater especial/emergencial
    - E depois de resolvido, terá que ser acrescentado na Master e nos outros branches, como Develop e Release;

Bom, por enquanto essa será as etapas a serrem cumpridas, para organizar um desenvolvimento e tentar fazê-lo com um pouco mais de segurança, mas claro, sujeito ainda sim a BUGS.




