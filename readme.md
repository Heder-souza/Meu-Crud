3.2 - (1)
    INSERT INTO tarefas (titulo, descricao, status) VALUES
        ('Comprar leite', 'Ir ao mercado e comprar dois litros de leite desnatado.', 'feito'),
        ('Estudar PHP', 'Finalizar o módulo de conexão com banco de dados.', 'pendente'),
        ('Academia', 'Treinar pernas e fazer 30 minutos de cardio.', 'pendente');

3.2 - (2)
    SELECT * FROM tarefas WHERE status = 'pendente';

3.2 - (3)
    SELECT * FROM tarefas ORDER BY criado_em DESC;

====================================================================================================

4.2 - (1) O utf8mb4 resolve as limitações do clássico utf8 padrão pois enquanto o utf8 padrão armazena caracteres de somente 3 bytes o utf8mb4 consegue armazenar 4 bytes por caracter, o que é muito comum atualmente seja com simbolos matematicos, ideogramas asiaticos ou o mais comum, **emojis**😆😂😍. Fonte: *Manual Oficial do PHP - PDO MySQL DSN* e *Documentação MySQL sobre Charsets.*

4.2 - (2) Sem o PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION o PDO poderia falhar e não informar nada ou retornar só códigos de erro. Com esse atributo o PHP sempre que ocorrer um erro de banco de dados lançará uma PDOExeption, o que permite o uso do try catch para facilitar a visualização de erros que antes não iriam aparecer ou seriam mal informados. Fonte: *OWASP - SQL Injection Prevention Cheat Sheet.*

====================================================================================================


5.2 - (1) Somente a função de listar tarefas usa a query() pois ela é a unica função que não depende de um valor dinâmico(que muda) como algum campo que o usuario vai informar como o titulo ou a descrição da tarefa.

5.2 - (2) O prepare garante que os dados tipo o titulo, descrição e etc, sejam tratados somente como dados e não como parte do código executável, evitando que o usuário faça SQL injection. Fonte: *W3Schools - PHP Prepared Statements*


        
