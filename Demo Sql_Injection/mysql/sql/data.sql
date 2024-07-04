SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `giuaki`
--
CREATE DATABASE IF NOT EXISTS `essay` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `essay`;

-- --------------------------------------------------------

--
-- Table structure for table `account1`
--

CREATE TABLE `account1` (
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account1`
--

INSERT INTO `account1` (`username`, `password`, `firstname`, `lastname`, `email`) VALUES
('NV01', '123456', 'Bảo', 'Mai Thế Gia', 'giabao@gmail.com'),
('NV02', '123456', 'Đệ', 'Huỳnh Văn', 'vande@gmail.com'),
('NV03', '123456', 'Tín', 'Nguyễn Chánh', 'chanhtin@gmail.com'),
('NV04', '123456', 'Tín', 'Nguyễn Trung', 'trungtin@gmail.com');


-- --------------------------------------------------------

--
-- Table structure for table `account2`
--

CREATE TABLE `account2` (
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account2`
--

INSERT INTO `account2` (`username`, `password`, `firstname`, `lastname`, `email`) VALUES
('NV01', '$2a$12$g0kjZMxtYiEK2gDZzilugO37hxPufk8/p69uUaaNMDjxpq0a7q7SO', 'Bảo', 'Mai Thế Gia', 'giabao@gmail.com'),
('NV02', '$2a$12$g0kjZMxtYiEK2gDZzilugO37hxPufk8/p69uUaaNMDjxpq0a7q7SO', 'Đệ', 'Huỳnh Văn', 'vande@gmail.com'),
('NV03', '$2a$12$g0kjZMxtYiEK2gDZzilugO37hxPufk8/p69uUaaNMDjxpq0a7q7SO', 'Tín', 'Nguyễn Chánh', 'chanhtin@gmail.com'),
('NV04', '$2a$12$g0kjZMxtYiEK2gDZzilugO37hxPufk8/p69uUaaNMDjxpq0a7q7SO', 'Tín', 'Nguyễn Trung', 'trungtin@gmail.com');


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'Samsung S22 Ultra', 21990000, 'Hàng chính hãng', 'samsung12.png'),
(2, 'Samsung A22 5G', 5299000, 'Hàng chính hãng', 'a225g.png'),
(3, 'Iphone 12 256GB', 14490000, 'Hàng chính hãng', 'iphone12.png'),
(4, 'Xiaomi Redmi Note 7', 5990000, 'Hàng chính hãng', 'RedmiNote7.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account1`
--
ALTER TABLE `account1`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `account2`
--
ALTER TABLE `account2`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
