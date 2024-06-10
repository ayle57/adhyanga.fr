
import Link from 'next/link';

export default function Footer() {
    return (
        <footer id="footer">
            <div className="top-badge-container">
                <Link href="https://fr-fr.facebook.com/people/Adeline-Pierrot/100086212765567/" target="blank"
                   className="badge">
                    Me suivre sur facebook
                </Link>
                <Link href="/#contact" className="badge">
                    Contact
                </Link>
                <Link href="/legals" className="badge">
                    Mentions Légales
                </Link>

            </div>
        </footer>
    )
}
