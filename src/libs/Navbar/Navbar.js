import Link from "next/link";

export default function Navbar() {
    return (<nav className="navbar">
        <ul className="navlinks-container">
            <li>
                <Link href="#services">
                    Services
                </Link>
            </li>
            <li>
                <Link href="#about">
                    A-propos
                </Link>
            </li>
            <li>
                <Link href="#contact" className="btn">
                    Contactez moi
                </Link>
            </li>
        </ul>
    </nav>)
}
