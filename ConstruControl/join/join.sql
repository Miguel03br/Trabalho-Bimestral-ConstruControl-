/*CREATE TABLE `id_andamento` (
    `id` int(11) NOT NULL,
    `nome` text NOT NULL
  );
  
  ALTER TABLE `id_andamento`
    ADD PRIMARY KEY (`id`);
  
  INSERT INTO `id_andamento` (`id`, `nome`) VALUES
  (1, 'Sera_iniciada'),
  (2, 'Em_construcao'),
  (3, 'Finalizada')
  */

  
  select p.nome_construcao, p.data_final, p.processo_andamento, p.solicitacao, c.id, c.nome as id_andamento
  from tabelas as p
  join id_andamento as c on p.id_id_andamento = c.id;
  
  select count(c.id) as contIDcat, c.nome as id_andamento
  from tabelas as p
  join id_andamento as c on p.id_id_andamento = c.id
  group by c.id order by contIDcat desc;
  