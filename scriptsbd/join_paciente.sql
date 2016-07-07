SELECT id_pessoa, pes_cpf, pes_nome, pes_rg, tb_orgao_expedidor.id_orgao_expedidor, tb_orgao_expedidor.nome_orgao_expedidor, pes_data_nascimento, pes_sexo, 
tb_estado_civil.id_estado_civil, tb_estado_civil.est_descricao, tb_telefone.id_telefone, tb_telefone.num_telefone_celular, tb_telefone.id_telefone, 
tb_telefone.num_telefone_residencial, tb_telefone.id_telefone, tb_telefone.num_telefone_comercial, email, tb_logradouro_tipo.id_logradouro_tipo, 
tb_logradouro_tipo.tp_log_descricao, tb_logradouro.id_logradouro, tb_logradouro.log_descricao, tb_endereco.id_endereco, tb_endereco.end_complemento, tb_endereco.end_numero, 
tb_endereco.end_cep, tb_bairro.id_bairro, tb_bairro.bai_nome, tb_cidade.id_cidade, tb_cidade.cid_nome, tb_uf.id_uf, tb_uf.uf_descricao
FROM tb_pessoa
LEFT JOIN tb_telefone
ON tb_telefone.pessoa_id = tb_pessoa.id_pessoa
LEFT JOIN tb_endereco
ON tb_pessoa.endereco_id = tb_endereco.id_endereco
LEFT JOIN tb_logradouro
ON tb_endereco.logradouro_id = tb_logradouro.id_logradouro
LEFT JOIN tb_logradouro_tipo
ON tb_logradouro.logradouro_tipo_id = tb_logradouro_tipo.id_logradouro_tipo
LEFT JOIN tb_bairro
ON tb_endereco.bairro_id = tb_bairro.id_bairro
LEFT JOIN tb_cidade
ON tb_bairro.cidade_id = tb_cidade.id_cidade
LEFT JOIN tb_uf
ON tb_cidade.uf_id = tb_uf.id_uf
LEFT JOIN tb_estado_civil
ON tb_pessoa.estado_civil_id = tb_estado_civil.id_estado_civil
LEFT JOIN tb_orgao_expedidor
ON tb_pessoa.orgao_expedidor_id = tb_orgao_expedidor.id_orgao_expedidor
ORDER BY tb_pessoa.id_pessoa ASC;

