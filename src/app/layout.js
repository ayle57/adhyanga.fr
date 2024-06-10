import styles from './build/App.css'

export const metadata = {
  title: "Adhyanga",
  description: "Bienvenue sur adhyanga votre cabinet de soin en ligne",
};

export default function RootLayout({ children }) {
  return (
    <html lang="fr">
      <body>{children}</body>
    </html>
  );
}
