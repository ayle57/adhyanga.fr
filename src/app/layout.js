import styles from './build/App.css'

export const metadata = {
  title: "Adhyanga - Votre cabinet de soin kinésiologique et ayurvédique sur Angoulême",
  description: "Adhyanga - Cabinet de soin kinésiologique et ayurvédique à Angoulême. Découvrez une approche holistique avec Adeline Pierrot, praticienne expérimentée, pour harmoniser votre bien-être physique et émotionnel.",
  author: "Adeline Pierrot",
  keywords: "Adeline Pierrot, Cabinet, Cabinet de soins, Kinésiologie, Ayurvéda, Lithothérapie",
  openGraph: {
    type: "website",
    url: "https://www.adhyanga.fr",
    title: "Adhyanga - Votre cabinet de soin kinésiologique et ayurvédique sur Angoulême",
    description: "Adhyanga - Cabinet de soin kinésiologique et ayurvédique à Angoulême. Découvrez une approche holistique avec Adeline Pierrot, praticienne expérimentée, pour harmoniser votre bien-être physique et émotionnel.",
    image: "https://adhyanga.fr/images/logoRemoved.png"
  },
  twitter: {
    url: "https://www.adhyanga.fr",
    title: "Adhyanga - Votre cabinet de soin kinésiologique et ayurvédique sur Angoulême",
    description: "Adhyanga - Cabinet de soin kinésiologique et ayurvédique à Angoulême. Découvrez une approche holistique avec Adeline Pierrot, praticienne expérimentée, pour harmoniser votre bien-être physique et émotionnel."
  },
  icons: {
    icon: '/images/logoRemoved.png'
  }
};

export default function RootLayout({ children }) {
  return (
    <html lang="fr">
      <body>{children}</body>
    </html>
  );
}
