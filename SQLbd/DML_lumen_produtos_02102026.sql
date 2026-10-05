-- DML DATA MANIPULATION LANGUAGE

-- Inserção de Lojas
INSERT INTO `lojas` (`nome`, `descricao`, `ativo`) VALUES
('TechZone Eletrônicos', 'Loja especializada em informática e gadgets de última geração', 1),
('EletroMix', 'Variedade em eletrodomésticos, áudio e vídeo', 1),
('Mega Byte', 'Acessórios, periféricos e componentes para computadores', 1);

-- Inserção de Categorias
INSERT INTO `categorias` (`nome`, `descricao`, `ativo`) VALUES
('Smartphones', 'Celulares inteligentes e aparelhos móveis', 1),
('Notebooks', 'Computadores portáteis para trabalho e estudo', 1),
('Áudio', 'Fones de ouvido, caixas de som e equipamentos sonoros', 1),
('Periféricos', 'Teclados, mouses, monitores e acessórios de informática', 1);

-- Inserção de Produtos
INSERT INTO `produtos` (`nome`, `descricao`, `preco`, `ativo`, `id_loja`, `id_categoria`) VALUES
('Smartphone Galaxy S23', '128GB, Tela Dynamic AMOLED 6.1", Câmera Tripla', 3499.00, 1, 1, 1),
('iPhone 15', '128GB, Tela Super Retina XDR 6.1", Chip A16 Bionic', 4999.90, 1, 1, 1),
('Notebook Dell Inspiron', 'Intel Core i5, 16GB RAM, SSD 512GB, Tela 15.6" FHD', 3899.00, 1, 1, 2),
('MacBook Air M2', 'Apple M2, 8GB RAM, SSD 256GB, Tela 13.6"', 7299.00, 1, 2, 2),
('Fone Bluetooth JBL Tune 510BT', 'Até 40h de bateria, conexão multiponto, microfone embutido', 249.90, 1, 3, 3),
('Caixa de Som JBL Flip 6', 'Resistente à água (IP67), 20W RMS, Bluetooth 5.1', 699.00, 1, 2, 3),
('Mouse Sem Fio Logitech MX Master 3S', 'Sensor 8K DPI, cliques silenciosos, rolagem MagSpeed', 549.90, 1, 3, 4),
('Teclado Mecânico Redragon Kumara', 'Switch Outemu Blue, RGB, layout ABNT2', 229.00, 1, 3, 4);