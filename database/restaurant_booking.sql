-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2025 at 02:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `booking_datetime` datetime NOT NULL,
  `guests_count` int(11) NOT NULL,
  `status` enum('pending','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
  `special_requests` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `restaurant_id`, `booking_datetime`, `guests_count`, `status`, `special_requests`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-05-10 18:00:00', 2, 'cancelled', NULL, '2025-05-09 11:40:36', '2025-05-09 11:41:56'),
(2, 1, 1, '2025-05-10 18:00:00', 9, 'cancelled', 'ew', '2025-05-09 11:42:30', '2025-05-09 12:04:28'),
(3, 1, 5, '2025-05-10 18:00:00', 4, 'pending', NULL, '2025-05-09 11:49:59', '2025-05-09 11:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`id`, `restaurant_id`, `name`, `description`, `price`, `category`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jollof Rice with Chicken', 'Spicy rice cooked in tomato sauce and spices, served with grilled chicken and fried plantains.', 45.00, 'Traditional', 'https://images.unsplash.com/photo-1604329760661-e71dc83f8f26?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 11:00:01'),
(2, 1, 'Waakye Special', 'Rice and beans cooked with millet leaves, served with spaghetti, fish, meat, boiled egg, and shito sauce.', 40.00, 'Main Course', 'https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(3, 1, 'Banku with Tilapia', 'Fermented corn and cassava dough served with grilled tilapia, pepper sauce, and fresh vegetables.', 55.00, 'Main Course', 'https://images.unsplash.com/photo-1580476262798-bddd9f4b7369?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(4, 1, 'Kelewele', 'Spicy fried plantains seasoned with ginger, cayenne pepper, and other spices.', 20.00, 'Appetizer', 'https://images.unsplash.com/photo-1559847844-5315695dadae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(5, 1, 'Meat Pie', 'Flaky pastry filled with seasoned minced meat, onions, and spices.', 15.00, 'Appetizer', 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(6, 1, 'Fufu with Light Soup', 'Pounded cassava and plantain dough served with spicy, aromatic soup with your choice of meat or fish.', 50.00, 'Traditional', 'https://images.unsplash.com/photo-1551218808-94e220e084d2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(7, 1, 'Tuo Zaafi', 'Traditional Northern Ghanaian dish made from millet or corn flour, served with ayoyo soup and dawadawa.', 45.00, 'Traditional', 'https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(8, 1, 'Sobolo (Hibiscus Drink)', 'Refreshing hibiscus tea infused with ginger, pineapple, and spices. Served chilled.', 12.00, 'Beverage', 'https://images.unsplash.com/photo-1583242122430-d224bc5e1a7c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(9, 1, 'Palm Wine', 'Traditional Ghanaian alcoholic beverage made from the sap of palm trees. Sweet and slightly fermented.', 18.00, 'Beverage', 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(10, 1, 'Bofrot (Puff Puff)', 'Sweet, deep-fried dough balls, similar to doughnuts. Served warm with a dusting of sugar.', 15.00, 'Dessert', 'https://images.unsplash.com/photo-1556679343-c1358a163828?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(11, 1, 'Tropical Fruit Platter', 'Selection of fresh seasonal fruits including pineapple, mango, watermelon, and papaya.', 25.00, 'Dessert', 'https://images.unsplash.com/photo-1478144592103-25e218a04891?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(12, 2, 'Jollof Rice with Chicken', 'Spicy rice cooked in tomato sauce and spices, served with grilled chicken and fried plantains.', 45.00, 'Main Course', 'https://images.unsplash.com/photo-1604329760661-e71dc83f8f26?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(13, 2, 'Waakye Special', 'Rice and beans cooked with millet leaves, served with spaghetti, fish, meat, boiled egg, and shito sauce.', 40.00, 'Main Course', 'https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(14, 2, 'Banku with Tilapia', 'Fermented corn and cassava dough served with grilled tilapia, pepper sauce, and fresh vegetables.', 55.00, 'Main Course', 'https://images.unsplash.com/photo-1580476262798-bddd9f4b7369?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(15, 2, 'Kelewele', 'Spicy fried plantains seasoned with ginger, cayenne pepper, and other spices.', 20.00, 'Appetizer', 'https://images.unsplash.com/photo-1559847844-5315695dadae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(16, 2, 'Meat Pie', 'Flaky pastry filled with seasoned minced meat, onions, and spices.', 15.00, 'Appetizer', 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(17, 2, 'Fufu with Light Soup', 'Pounded cassava and plantain dough served with spicy, aromatic soup with your choice of meat or fish.', 50.00, 'Traditional', 'https://images.unsplash.com/photo-1551218808-94e220e084d2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(18, 2, 'Tuo Zaafi', 'Traditional Northern Ghanaian dish made from millet or corn flour, served with ayoyo soup and dawadawa.', 45.00, 'Traditional', 'https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(19, 2, 'Sobolo (Hibiscus Drink)', 'Refreshing hibiscus tea infused with ginger, pineapple, and spices. Served chilled.', 12.00, 'Beverage', 'https://images.unsplash.com/photo-1583242122430-d224bc5e1a7c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(20, 2, 'Palm Wine', 'Traditional Ghanaian alcoholic beverage made from the sap of palm trees. Sweet and slightly fermented.', 18.00, 'Beverage', 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(21, 2, 'Bofrot (Puff Puff)', 'Sweet, deep-fried dough balls, similar to doughnuts. Served warm with a dusting of sugar.', 15.00, 'Dessert', 'https://images.unsplash.com/photo-1556679343-c1358a163828?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(22, 2, 'Tropical Fruit Platter', 'Selection of fresh seasonal fruits including pineapple, mango, watermelon, and papaya.', 25.00, 'Dessert', 'https://images.unsplash.com/photo-1478144592103-25e218a04891?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(23, 3, 'Jollof Rice with Chicken', 'Spicy rice cooked in tomato sauce and spices, served with grilled chicken and fried plantains.', 45.00, 'Main Course', 'https://images.unsplash.com/photo-1604329760661-e71dc83f8f26?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(24, 3, 'Waakye Special', 'Rice and beans cooked with millet leaves, served with spaghetti, fish, meat, boiled egg, and shito sauce.', 40.00, 'Main Course', 'https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(25, 3, 'Banku with Tilapia', 'Fermented corn and cassava dough served with grilled tilapia, pepper sauce, and fresh vegetables.', 55.00, 'Main Course', 'https://images.unsplash.com/photo-1580476262798-bddd9f4b7369?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(26, 3, 'Kelewele', 'Spicy fried plantains seasoned with ginger, cayenne pepper, and other spices.', 20.00, 'Appetizer', 'https://images.unsplash.com/photo-1559847844-5315695dadae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(27, 3, 'Meat Pie', 'Flaky pastry filled with seasoned minced meat, onions, and spices.', 15.00, 'Appetizer', 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(28, 3, 'Fufu with Light Soup', 'Pounded cassava and plantain dough served with spicy, aromatic soup with your choice of meat or fish.', 50.00, 'Traditional', 'https://images.unsplash.com/photo-1551218808-94e220e084d2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(29, 3, 'Tuo Zaafi', 'Traditional Northern Ghanaian dish made from millet or corn flour, served with ayoyo soup and dawadawa.', 45.00, 'Traditional', 'https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(30, 3, 'Sobolo (Hibiscus Drink)', 'Refreshing hibiscus tea infused with ginger, pineapple, and spices. Served chilled.', 12.00, 'Beverage', 'https://images.unsplash.com/photo-1583242122430-d224bc5e1a7c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(31, 3, 'Palm Wine', 'Traditional Ghanaian alcoholic beverage made from the sap of palm trees. Sweet and slightly fermented.', 18.00, 'Beverage', 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(32, 3, 'Bofrot (Puff Puff)', 'Sweet, deep-fried dough balls, similar to doughnuts. Served warm with a dusting of sugar.', 15.00, 'Dessert', 'https://images.unsplash.com/photo-1556679343-c1358a163828?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(33, 3, 'Tropical Fruit Platter', 'Selection of fresh seasonal fruits including pineapple, mango, watermelon, and papaya.', 25.00, 'Dessert', 'https://images.unsplash.com/photo-1478144592103-25e218a04891?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(34, 4, 'Jollof Rice with Chicken', 'Spicy rice cooked in tomato sauce and spices, served with grilled chicken and fried plantains.', 45.00, 'Main Course', 'https://images.unsplash.com/photo-1604329760661-e71dc83f8f26?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(35, 4, 'Waakye Special', 'Rice and beans cooked with millet leaves, served with spaghetti, fish, meat, boiled egg, and shito sauce.', 40.00, 'Main Course', 'https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(36, 4, 'Banku with Tilapia', 'Fermented corn and cassava dough served with grilled tilapia, pepper sauce, and fresh vegetables.', 55.00, 'Main Course', 'https://images.unsplash.com/photo-1580476262798-bddd9f4b7369?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(37, 4, 'Kelewele', 'Spicy fried plantains seasoned with ginger, cayenne pepper, and other spices.', 20.00, 'Appetizer', 'https://images.unsplash.com/photo-1559847844-5315695dadae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(38, 4, 'Meat Pie', 'Flaky pastry filled with seasoned minced meat, onions, and spices.', 15.00, 'Appetizer', 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(39, 4, 'Fufu with Light Soup', 'Pounded cassava and plantain dough served with spicy, aromatic soup with your choice of meat or fish.', 50.00, 'Traditional', 'https://images.unsplash.com/photo-1551218808-94e220e084d2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(40, 4, 'Tuo Zaafi', 'Traditional Northern Ghanaian dish made from millet or corn flour, served with ayoyo soup and dawadawa.', 45.00, 'Traditional', 'https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(41, 4, 'Sobolo (Hibiscus Drink)', 'Refreshing hibiscus tea infused with ginger, pineapple, and spices. Served chilled.', 12.00, 'Beverage', 'https://images.unsplash.com/photo-1583242122430-d224bc5e1a7c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(42, 4, 'Palm Wine', 'Traditional Ghanaian alcoholic beverage made from the sap of palm trees. Sweet and slightly fermented.', 18.00, 'Beverage', 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(43, 4, 'Bofrot (Puff Puff)', 'Sweet, deep-fried dough balls, similar to doughnuts. Served warm with a dusting of sugar.', 15.00, 'Dessert', 'https://images.unsplash.com/photo-1556679343-c1358a163828?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(44, 4, 'Tropical Fruit Platter', 'Selection of fresh seasonal fruits including pineapple, mango, watermelon, and papaya.', 25.00, 'Dessert', 'https://images.unsplash.com/photo-1478144592103-25e218a04891?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(45, 5, 'Jollof Rice with Chicken', 'Spicy rice cooked in tomato sauce and spices, served with grilled chicken and fried plantains.', 45.00, 'Main Course', 'https://images.unsplash.com/photo-1604329760661-e71dc83f8f26?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(46, 5, 'Waakye Special', 'Rice and beans cooked with millet leaves, served with spaghetti, fish, meat, boiled egg, and shito sauce.', 40.00, 'Main Course', 'https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(47, 5, 'Banku with Tilapia', 'Fermented corn and cassava dough served with grilled tilapia, pepper sauce, and fresh vegetables.', 55.00, 'Main Course', 'https://images.unsplash.com/photo-1580476262798-bddd9f4b7369?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(48, 5, 'Kelewele', 'Spicy fried plantains seasoned with ginger, cayenne pepper, and other spices.', 20.00, 'Appetizer', 'https://images.unsplash.com/photo-1559847844-5315695dadae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(49, 5, 'Meat Pie', 'Flaky pastry filled with seasoned minced meat, onions, and spices.', 15.00, 'Appetizer', 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(50, 5, 'Fufu with Light Soup', 'Pounded cassava and plantain dough served with spicy, aromatic soup with your choice of meat or fish.', 50.00, 'Traditional', 'https://images.unsplash.com/photo-1551218808-94e220e084d2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(51, 5, 'Tuo Zaafi', 'Traditional Northern Ghanaian dish made from millet or corn flour, served with ayoyo soup and dawadawa.', 45.00, 'Traditional', 'https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(52, 5, 'Sobolo (Hibiscus Drink)', 'Refreshing hibiscus tea infused with ginger, pineapple, and spices. Served chilled.', 12.00, 'Beverage', 'https://images.unsplash.com/photo-1583242122430-d224bc5e1a7c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(53, 5, 'Palm Wine', 'Traditional Ghanaian alcoholic beverage made from the sap of palm trees. Sweet and slightly fermented.', 18.00, 'Beverage', 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(54, 5, 'Bofrot (Puff Puff)', 'Sweet, deep-fried dough balls, similar to doughnuts. Served warm with a dusting of sugar.', 15.00, 'Dessert', 'https://images.unsplash.com/photo-1556679343-c1358a163828?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(55, 5, 'Tropical Fruit Platter', 'Selection of fresh seasonal fruits including pineapple, mango, watermelon, and papaya.', 25.00, 'Dessert', 'https://images.unsplash.com/photo-1478144592103-25e218a04891?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(56, 6, 'Jollof Rice with Chicken', 'Spicy rice cooked in tomato sauce and spices, served with grilled chicken and fried plantains.', 45.00, 'Main Course', 'https://images.unsplash.com/photo-1604329760661-e71dc83f8f26?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(57, 6, 'Waakye Special', 'Rice and beans cooked with millet leaves, served with spaghetti, fish, meat, boiled egg, and shito sauce.', 40.00, 'Main Course', 'https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(58, 6, 'Banku with Tilapia', 'Fermented corn and cassava dough served with grilled tilapia, pepper sauce, and fresh vegetables.', 55.00, 'Main Course', 'https://images.unsplash.com/photo-1580476262798-bddd9f4b7369?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(59, 6, 'Kelewele', 'Spicy fried plantains seasoned with ginger, cayenne pepper, and other spices.', 20.00, 'Appetizer', 'https://images.unsplash.com/photo-1559847844-5315695dadae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(60, 6, 'Meat Pie', 'Flaky pastry filled with seasoned minced meat, onions, and spices.', 15.00, 'Appetizer', 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(61, 6, 'Fufu with Light Soup', 'Pounded cassava and plantain dough served with spicy, aromatic soup with your choice of meat or fish.', 50.00, 'Traditional', 'https://images.unsplash.com/photo-1551218808-94e220e084d2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(62, 6, 'Tuo Zaafi', 'Traditional Northern Ghanaian dish made from millet or corn flour, served with ayoyo soup and dawadawa.', 45.00, 'Traditional', 'https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(63, 6, 'Sobolo (Hibiscus Drink)', 'Refreshing hibiscus tea infused with ginger, pineapple, and spices. Served chilled.', 12.00, 'Beverage', 'https://images.unsplash.com/photo-1583242122430-d224bc5e1a7c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(64, 6, 'Palm Wine', 'Traditional Ghanaian alcoholic beverage made from the sap of palm trees. Sweet and slightly fermented.', 18.00, 'Beverage', 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(65, 6, 'Bofrot (Puff Puff)', 'Sweet, deep-fried dough balls, similar to doughnuts. Served warm with a dusting of sugar.', 15.00, 'Dessert', 'https://images.unsplash.com/photo-1556679343-c1358a163828?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(66, 6, 'Tropical Fruit Platter', 'Selection of fresh seasonal fruits including pineapple, mango, watermelon, and papaya.', 25.00, 'Dessert', 'https://images.unsplash.com/photo-1478144592103-25e218a04891?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(67, 7, 'Jollof Rice with Chicken', 'Spicy rice cooked in tomato sauce and spices, served with grilled chicken and fried plantains.', 45.00, 'Main Course', 'https://images.unsplash.com/photo-1604329760661-e71dc83f8f26?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(68, 7, 'Waakye Special', 'Rice and beans cooked with millet leaves, served with spaghetti, fish, meat, boiled egg, and shito sauce.', 40.00, 'Main Course', 'https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(69, 7, 'Banku with Tilapia', 'Fermented corn and cassava dough served with grilled tilapia, pepper sauce, and fresh vegetables.', 55.00, 'Main Course', 'https://images.unsplash.com/photo-1580476262798-bddd9f4b7369?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(70, 7, 'Kelewele', 'Spicy fried plantains seasoned with ginger, cayenne pepper, and other spices.', 20.00, 'Appetizer', 'https://images.unsplash.com/photo-1559847844-5315695dadae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(71, 7, 'Meat Pie', 'Flaky pastry filled with seasoned minced meat, onions, and spices.', 15.00, 'Appetizer', 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(72, 7, 'Fufu with Light Soup', 'Pounded cassava and plantain dough served with spicy, aromatic soup with your choice of meat or fish.', 50.00, 'Traditional', 'https://images.unsplash.com/photo-1551218808-94e220e084d2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(73, 7, 'Tuo Zaafi', 'Traditional Northern Ghanaian dish made from millet or corn flour, served with ayoyo soup and dawadawa.', 45.00, 'Traditional', 'https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(74, 7, 'Sobolo (Hibiscus Drink)', 'Refreshing hibiscus tea infused with ginger, pineapple, and spices. Served chilled.', 12.00, 'Beverage', 'https://images.unsplash.com/photo-1583242122430-d224bc5e1a7c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(75, 7, 'Palm Wine', 'Traditional Ghanaian alcoholic beverage made from the sap of palm trees. Sweet and slightly fermented.', 18.00, 'Beverage', 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(76, 7, 'Bofrot (Puff Puff)', 'Sweet, deep-fried dough balls, similar to doughnuts. Served warm with a dusting of sugar.', 15.00, 'Dessert', 'https://images.unsplash.com/photo-1556679343-c1358a163828?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(77, 7, 'Tropical Fruit Platter', 'Selection of fresh seasonal fruits including pineapple, mango, watermelon, and papaya.', 25.00, 'Dessert', 'https://images.unsplash.com/photo-1478144592103-25e218a04891?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(78, 8, 'Jollof Rice with Chicken', 'Spicy rice cooked in tomato sauce and spices, served with grilled chicken and fried plantains.', 45.00, 'Main Course', 'https://images.unsplash.com/photo-1604329760661-e71dc83f8f26?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(79, 8, 'Waakye Special', 'Rice and beans cooked with millet leaves, served with spaghetti, fish, meat, boiled egg, and shito sauce.', 40.00, 'Main Course', 'https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(80, 8, 'Banku with Tilapia', 'Fermented corn and cassava dough served with grilled tilapia, pepper sauce, and fresh vegetables.', 55.00, 'Main Course', 'https://images.unsplash.com/photo-1580476262798-bddd9f4b7369?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(81, 8, 'Kelewele', 'Spicy fried plantains seasoned with ginger, cayenne pepper, and other spices.', 20.00, 'Appetizer', 'https://images.unsplash.com/photo-1559847844-5315695dadae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(82, 8, 'Meat Pie', 'Flaky pastry filled with seasoned minced meat, onions, and spices.', 15.00, 'Appetizer', 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(83, 8, 'Fufu with Light Soup', 'Pounded cassava and plantain dough served with spicy, aromatic soup with your choice of meat or fish.', 50.00, 'Traditional', 'https://images.unsplash.com/photo-1551218808-94e220e084d2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(84, 8, 'Tuo Zaafi', 'Traditional Northern Ghanaian dish made from millet or corn flour, served with ayoyo soup and dawadawa.', 45.00, 'Traditional', 'https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(85, 8, 'Sobolo (Hibiscus Drink)', 'Refreshing hibiscus tea infused with ginger, pineapple, and spices. Served chilled.', 12.00, 'Beverage', 'https://images.unsplash.com/photo-1583242122430-d224bc5e1a7c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(86, 8, 'Palm Wine', 'Traditional Ghanaian alcoholic beverage made from the sap of palm trees. Sweet and slightly fermented.', 18.00, 'Beverage', 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(87, 8, 'Bofrot (Puff Puff)', 'Sweet, deep-fried dough balls, similar to doughnuts. Served warm with a dusting of sugar.', 15.00, 'Dessert', 'https://images.unsplash.com/photo-1556679343-c1358a163828?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(88, 8, 'Tropical Fruit Platter', 'Selection of fresh seasonal fruits including pineapple, mango, watermelon, and papaya.', 25.00, 'Dessert', 'https://images.unsplash.com/photo-1478144592103-25e218a04891?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"88c0c592-41a4-4e32-8ad9-77b8dc70cd85\",\"displayName\":\"App\\\\Jobs\\\\SendBookingReminderEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingReminderEmail\",\"command\":\"O:33:\\\"App\\\\Jobs\\\\SendBookingReminderEmail\\\":2:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Booking\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2025-05-10 17:30:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1746898200, 1746790836),
(2, 'default', '{\"uuid\":\"21e815ba-7cd8-4d0f-951d-6a6198988050\",\"displayName\":\"App\\\\Jobs\\\\SendBookingReminderEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingReminderEmail\",\"command\":\"O:33:\\\"App\\\\Jobs\\\\SendBookingReminderEmail\\\":2:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Booking\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2025-05-10 17:30:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1746898200, 1746790950),
(3, 'default', '{\"uuid\":\"21d6ce97-0fd6-487b-8469-20bf316628b4\",\"displayName\":\"App\\\\Jobs\\\\SendBookingReminderEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendBookingReminderEmail\",\"command\":\"O:33:\\\"App\\\\Jobs\\\\SendBookingReminderEmail\\\":2:{s:10:\\\"\\u0000*\\u0000booking\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:18:\\\"App\\\\Models\\\\Booking\\\";s:2:\\\"id\\\";i:3;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2025-05-10 17:30:00.000000\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}}\"}}', 0, NULL, 1746898200, 1746791399);

-- --------------------------------------------------------

--
-- Table structure for table `meal_orders`
--

CREATE TABLE `meal_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `food_item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_at_order` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal_orders`
--

INSERT INTO `meal_orders` (`id`, `booking_id`, `food_item_id`, `quantity`, `price_at_order`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 1, 45.00, '2025-05-09 11:40:36', '2025-05-09 11:40:36'),
(2, 2, 1, 4, 45.00, '2025-05-09 11:42:30', '2025-05-09 11:42:30'),
(3, 2, 6, 3, 50.00, '2025-05-09 11:42:30', '2025-05-09 11:42:30'),
(4, 2, 7, 1, 45.00, '2025-05-09 11:42:30', '2025-05-09 11:42:30'),
(5, 2, 8, 2, 12.00, '2025-05-09 11:42:30', '2025-05-09 11:42:30'),
(6, 2, 10, 1, 15.00, '2025-05-09 11:42:30', '2025-05-09 11:42:30'),
(7, 3, 45, 2, 45.00, '2025-05-09 11:49:59', '2025-05-09 11:49:59'),
(8, 3, 46, 4, 40.00, '2025-05-09 11:49:59', '2025-05-09 11:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_05_09_094545_create_restaurants_table', 2),
(7, '2025_05_09_094814_create_food_items_table', 3),
(8, '2025_05_09_095324_create_bookings_table', 4),
(9, '2025_05_09_095446_create_meal_orders_table', 5),
(10, '2025_05_09_102733_create_jobs_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('eyandilutherking2003@gmail.com', '$2y$12$odzyz9L7EDLrCLGniw/ZTOsSZy8qlf2z/8h5ckzLyaXdbKHcABI96', '2025-05-09 12:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `description`, `location`, `contact_info`, `cover_image`, `created_at`, `updated_at`) VALUES
(1, 'Accra Delight', 'Experience authentic Ghanaian cuisine in the heart of Accra. Our chefs prepare traditional dishes using fresh, locally-sourced ingredients. From perfectly spiced jollof rice to savory banku and tilapia, we offer a true taste of Ghana in a warm, welcoming atmosphere.', 'East Legon, Accra', '+233 20 123 4567', 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(2, 'Waakye Paradise', 'Dedicated to perfecting Ghana\'s beloved waakye dish, our restaurant serves this classic rice and beans delicacy with all the traditional accompaniments. Enjoy our signature shito sauce, perfectly fried plantains, and your choice of protein in a casual, family-friendly setting.', 'Osu, Accra', '+233 24 987 6543', 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(3, 'Coastal Flavors', 'Specializing in fresh seafood and coastal Ghanaian dishes, we bring the taste of Ghana\'s shoreline to your plate. Our grilled tilapia, seafood okro stew, and palm nut soup are customer favorites. Enjoy ocean views and the catch of the day in our beachside setting.', 'Labadi Beach, Accra', '+233 27 345 6789', 'https://images.unsplash.com/photo-1579871494447-9811cf80d66c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(4, 'Fusion Kitchen', 'Where Ghanaian cuisine meets international flavors. Our innovative chefs blend traditional Ghanaian ingredients with techniques from around the world to create unique, delicious dishes that surprise and delight. Try our jollof risotto or shito-infused pasta for a truly unforgettable dining experience.', 'Airport Residential Area, Accra', '+233 23 456 7890', 'https://images.unsplash.com/photo-1424847651672-bf20a4b0982b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(5, 'Palm Grove', 'A tranquil garden restaurant featuring palm wine and traditional Ghanaian delicacies. Our signature fufu and light soup, palmnut stew, and banku with pepper sauce highlight the rich culinary heritage of Ghana. Dine under the shade of palm trees in our outdoor garden setting.', 'Cantonments, Accra', '+233 26 789 0123', 'https://images.unsplash.com/photo-1519690889869-e705e59f72e1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(6, 'Savanna Grill', 'Inspired by Northern Ghanaian cuisine, we specialize in grilled meats, guinea fowl, and fragrant rice dishes. Our tuo zaafi and lamb kebabs showcase the bold flavors and spices of Ghana\'s northern regions. Enjoy our rustic décor and live traditional music on weekends.', 'Dzorwulu, Accra', '+233 25 678 9012', 'https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(7, 'Heritage House', 'Located in a restored colonial building, Heritage House celebrates Ghana\'s diverse culinary traditions. Each of our dining rooms represents a different region of Ghana, offering an educational and delicious tour of the country\'s food culture. Our menu rotates weekly to showcase regional specialties.', 'Labone, Accra', '+233 22 345 6789', 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58'),
(8, 'Modern Ghana', 'A contemporary take on Ghanaian cuisine, highlighting fresh, healthy ingredients and innovative cooking techniques. Our menu features lighter versions of traditional favorites alongside creative new dishes that reflect Ghana\'s evolving food scene. Sleek, modern decor and attentive service complete the experience.', 'Ridge, Accra', '+233 29 876 5432', 'https://images.unsplash.com/photo-1498654896293-37aacf113fd9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', '2025-05-09 10:51:58', '2025-05-09 10:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `phone_number` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone_number`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Luther Essum', 'eyandilutherking2003@gmail.com', NULL, '$2y$12$5Rz/ohWBZeqaKtthHWoLDubbCNaMcHlWY8zXjyAvdUaNMzxX4EPxK', 'customer', NULL, NULL, '2025-05-09 10:32:21', '2025-05-09 10:32:21'),
(2, 'dewfd', 'vokah84023@gearstag.com', NULL, '$2y$12$AVNgKYdz/UT89n0MlSp.p.TOFHPljZqsjxhsJaUfvjcm0SKmWFRO6', 'admin', NULL, NULL, '2025-05-09 10:45:06', '2025-05-09 10:45:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_items_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `meal_orders`
--
ALTER TABLE `meal_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meal_orders_booking_id_foreign` (`booking_id`),
  ADD KEY `meal_orders_food_item_id_foreign` (`food_item_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meal_orders`
--
ALTER TABLE `meal_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `food_items`
--
ALTER TABLE `food_items`
  ADD CONSTRAINT `food_items_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meal_orders`
--
ALTER TABLE `meal_orders`
  ADD CONSTRAINT `meal_orders_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meal_orders_food_item_id_foreign` FOREIGN KEY (`food_item_id`) REFERENCES `food_items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
