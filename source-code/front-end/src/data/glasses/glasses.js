// const glasses = [
//   {
//     id: 1,
//     title: "Aviator Classic",
//     description:
//       "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
//     image: "/images/Aviator-Classic.jpg",
//     price: 100,
//   },
//   {
//     id: 2,
//     title: "Round Metal",
//     description:
//       "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
//     image: "/images/Round-Metal.jpg",
//     price: 120,
//   },
//   {
//     id: 3,
//     title: "New Wayfarer Classic",
//     description:
//       "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
//     image: "/images/New-Wayfarer-Classic.jpg",
//     price: 140,
//   },
//   {
//     id: 4,
//     title: "Original Wayfarer Classic",
//     description:
//       "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
//     image: "/images/Original-Wayfarer-Classic.jpg",
//     price: 160,
//   },
//   {
//     id: 5,
//     title: "Clubmaster Classic",
//     description:
//       "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
//     image: "/images/Clubmaster-Classic.jpg",
//     price: 180,
//   },
//   {
//     id: 6,
//     title: "Clubmaster Optics",
//     description:
//       "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
//     image: "/images/Clubmaster-Optics.jpg",
//     price: 90,
//   },
//   {
//     id: 7,
//     title: "Round Metal Optics",
//     description:
//       "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
//     image: "/images/Round-Metal-Optics.jpg",
//     price: 110,
//   },
//   {
//     id: 8,
//     title: "Hexagonal Optics",
//     description:
//       "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
//     image: "/images/Hexagonal-Optics.jpg",
//     price: 130,
//   }, ,
//   {
//     id: 9,
//     title: "Aviator Optics",
//     description:
//       "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
//     image: "/images/Aviator-Optics.jpg",
//     price: 150,
//   },
//   {
//     id: 10,
//     title: "Erika Optics",
//     description:
//       "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
//     image: "/images/Erika-Optics.jpg",
//     price: 170,
//   }
// ];
import axios from "axios"
let glasses

fetch('http://127.0.0.1:8000/api/products')
  .then(res => res.json())
  .then(data => glasses = data)
// .then(() => console.log(glasses))
// glasses = fetchGlasses()
export default glasses;
